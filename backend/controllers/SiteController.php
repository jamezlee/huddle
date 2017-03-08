<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Project;
use backend\models\ProjectSearch;
use backend\models\Task;
use backend\models\TaskSearch;
use backend\models\Taskassign;
use backend\models\Activity;
use backend\models\ActivitySearch;



use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,

                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays dashboard.
     *
     * @return in process project, task and actvity
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $searchTaskModel = new TaskSearch();
        $searchActivityModel = new ActivitySearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataTaskProvider = $searchTaskModel->search(Yii::$app->request->queryParams);
        $dataActivityProvider = $searchActivityModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataTaskProvider' => $dataTaskProvider,
            'dataActivityProvider' => $dataActivityProvider,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout ='LoginLayout';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }



}
