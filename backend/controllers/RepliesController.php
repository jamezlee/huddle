<?php

namespace backend\controllers;

use Yii;
use backend\models\Replies;
use backend\models\RepliesSearch;
use backend\models\TopicSearch;
use backend\models\Topic;
use yii\data\ActiveDataProvider;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RepliesController implements the CRUD actions for Replies model.
 */
class RepliesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Replies models and topic.
     * @return mixed
     */
    public function actionIndex($key)
    {
        $searchModel = new RepliesSearch();
        $model = new Replies();

        $searhTopicModel = new TopicSearch();
        $model2 = new Topic();

        $dataProvider = new ActiveDataProvider([
            'query' => Replies::find()->where(['topicid'=>$key]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        $dataTopicProvider = new ActiveDataProvider([
            'query' => Topic::find()->where(['topicid'=>$key]),
        ]);

        if ($model->load(Yii::$app->request->post())){
            $model->topicid=$key;
            $model->save();
            return $this->redirect(['topic/index']);
        }
        else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
            return $this->render('index', [
                'model' => $model,
                'model2' => $model2,
                'searchModel' => $searchModel,
                'searhTopicModel'=>$searhTopicModel,
                'listDataProvider' => $dataProvider,
                'listTopicProvider'=> $dataTopicProvider,
            ]);
        }

    }

    /**
     * Displays a single Replies model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $searchModel = new RepliesSearch();
       // $dataProvider = $searchModel->search($this->);

        return $this->render('view', [
            'model' => $this->findModel($id),
            //'dataActivityProvider' => $dataActivityProvider,
        ]);
//
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
    }

    /**
     * Creates a new Replies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Replies();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['topic/index', 'key' => $model->topicid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Replies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->replyid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Replies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['topic/index']);
        //return $this->redirect(['index']);
    }

    /**
     * Finds the Replies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Replies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Replies::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
