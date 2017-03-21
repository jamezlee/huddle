<?php

namespace backend\controllers;

use Yii;
use backend\models\Task;
use backend\models\TaskSearch;
use backend\models\Activity;
use backend\models\User;
use backend\models\ActivitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends Controller
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
     * Lists all Task models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $searchActivity = new ActivitySearch();
        $getUser=User::findOne(['id'=>\Yii::$app->user->identity->id]);



      //  $query2s =Task::find()->where(['activityid'=>$dataarrays]);


        if($getUser->userrole=="Project Owner"){

            $query1s= Activity::find()->from(['project','activity'])->where('project.projectid=activity.projectid')->andWhere(['project.userid' => \Yii::$app->user->identity->id])->all();
            if($query1s){

                foreach($query1s as $query1){
                    $dataarrays[]=$query1->activityid ;
                }

            }else{
                $dataarrays[]=0;

            }

            //$dataActivityProvider = $searchActivity->search(Yii::$app->request->queryParams);
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->andWhere(['activityid'=>$dataarrays]);
            $dataProvider->query->orWhere(['userid'=>\Yii::$app->user->identity->id]);
           // $dataProvider->query->andWhere(['userid'=>\Yii::$app->user->identity->id]);
            $dataProvider->pagination->pageSize=10;
        }
        else{
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->andWhere(['userid'=>\Yii::$app->user->identity->id]);
            $dataProvider->pagination->pageSize=10;
        }



        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'activityProvider'=>$dataActivityProvider
        ]);
    }

    /**
     * Displays a single Task model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Task();

        if ($model->load(Yii::$app->request->post())) {


            if(!empty($model->newfile)&& $model->newfile->size !== 0){
                $model->newfile->saveAs('upload/' . $model->newfile);
                $model->taskfile = $model->newfile->name;

            }
            $model->save();

            return $this->redirect(['view', 'id' => $model->assignID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $current_image = $model->taskfile;

        if ($model->load(Yii::$app->request->post())) {
            $model->newfile = UploadedFile::getInstance($model, 'newfile');
            if(!empty($model->newfile)&& $model->newfile->size !== 0){
                $model->newfile->saveAs('upload/' .$model->newfile);
                $model->taskfile = $model->newfile->name;

            }else{
                $model->taskfile=$current_image;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->assignID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Task model.
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
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
