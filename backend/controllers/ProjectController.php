<?php

namespace backend\controllers;

//use GuzzleHttp\Psr7\UploadedFile;
use Yii;
use backend\models\Project;
use backend\models\User;
use backend\models\ProjectSearch;
use backend\models\Activity;
use backend\models\ActivitySearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create', 'update','index','view'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => true,
                        'verbs' => ['POST'],
                        'roles' => ['@'],
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $searchActivityModel = new ActivitySearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataActivityProvider = $searchActivityModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataActivityProvider' => $dataActivityProvider,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $searchActivityModel = new ActivitySearch();
        $dataActivityProvider = $searchActivityModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataActivityProvider' => $dataActivityProvider,
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       // if(Yii::$app->user->can('admin')){
        $dataUser= User::findOne(['id' => \Yii::$app->user->identity->id]);

        $model = new Project();
        if ($model->load(Yii::$app->request->post())) {
            $model->newfile = UploadedFile::getInstance($model, 'newfile');

            if(!empty($model->newfile)&& $model->newfile->size !== 0){
                $model->newfile->saveAs('upload/' . $model->newfile);
                $model->projectfile = $model->newfile->name;

            }
            if($dataUser->userrole=="Project Owner"){
                $model->userid = \Yii::$app->user->identity->id;
            }

                $model->save();
            return $this->redirect(['view', 'id' => $model->projectid]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

//        }
//        else{
//
//            throw new ForbiddenHttpException;
//        }

    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $current_image = $model->projectfile;

        if ($model->load(Yii::$app->request->post())) {
            $model->newfile = UploadedFile::getInstance($model, 'newfile');

          if(!empty($model->newfile)&& $model->newfile->size !== 0){
            $model->newfile->saveAs('upload/' .$model->newfile);
            $model->projectfile = $model->newfile->name;

         }else{
              $model->projectfile=$current_image;
          }
            $model->save();
            return $this->redirect(['view', 'id' => $model->projectid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
