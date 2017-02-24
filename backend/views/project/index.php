<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\User;
use backend\models\Project;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Pjax;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
 $this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <div class="card">
            <div class="card__header">
                <h1><?= Html::encode($this->title) ?></h1>
<!--                --><?//= Breadcrumbs::widget([
//                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//                ]) ?>


                <?= Alert::widget() ?>
                <?php Pjax::begin();?>
                <?php  echo $this->render('_search', ['model' => $searchModel]); ?>


                <p>
                    <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="card__body">

<!--                --><?//=Html::beginForm(['controller/bulk'],'post');?>
<!---->
<!---->
<!--                --><?//=Html::submitButton('Delete', ['class' => 'btn btn-info',]);?>
                <?


                $dataProvider = new ActiveDataProvider([
                    'query' => Project::find()->where(['userid' => Yii::$app->user->identity->getId()]),

                ]);

                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,

                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        //['class' => 'yii\grid\CheckboxColumn'],

                        //'projectid',
                        [
                            'attribute'=>'projectname',
                            'format'=>'raw',
                            'value' => function ($data) {
                                $userid=Yii::$app->user->identity->getId();
                                $usertest = User::findOne(['id'=>$userid]);

                                if($usertest->userrole == 'Project Owner'){
                                return Html::a($data->projectname,['project/view','id'=>$data->projectid]);
                                }
                                else{
                                    return $data->projectname;
                                }
                            },
                        ],
                        //'projectname',
                        'projectclassification',
                        'projectdescription:html',
                        'projectplannedstartdate',
                        'projectplannedenddate',
                        'projectactualstartdate',
                        'projectactualenddate',
                        'creationdate',
                        // 'userid',
                        [
                            'attribute'=>'userid',
                            //'sortable'=>true,
                            'format'=>'raw',
                            'value' => function ($data) {
                               // $userid=Yii::$app->user->identity->getId();
                                $usertest = User::findOne(['id'=>$data->userid]);
                                $usertest->username;
                                if($usertest){
                                    return $usertest->username;
                                }

                            },

                        ],
                        'projectstatus',

                        ['class' => 'yii\grid\ActionColumn',
                            'header'=>'Actions',
                            'template' => '{view} {update} {delete} ',
                            'visibleButtons'=>[
//                                'view' => [
//                                    $usertest->userrole == 'System Admin' ,
//                                    ],
                                'view' => function ($data) {
                                    $userid=Yii::$app->user->identity->getId();
                                    $usertest = User::findOne(['id'=>$userid]);
                                    if($usertest->userrole == 'Project Owner' || $usertest->userrole == 'System Admin'){
                                    return Html::a('<span class="fa fa-search"></span>View',['project/view','id'=>$data->projectid]);
                                    }

                                },
                                'update' => function ($data) {
                                    $userid=Yii::$app->user->identity->getId();
                                    $usertest = User::findOne(['id'=>$userid]);
                                    if($usertest->userrole == 'Project Owner' || $usertest->userrole == 'System Admin'){
                                        return Html::a('<span class="fa fa-search"></span>View',['project/update','id'=>$data->projectid]);
                                    }

                                },
                                'delete' => function ($data) {
                                    $userid=Yii::$app->user->identity->getId();
                                    $usertest = User::findOne(['id'=>$userid]);
                                    if($usertest->userrole == 'Project Owner' || $usertest->userrole == 'System Admin'){
                                        return Html::a('<span class="fa fa-search"></span>View',['project/delete','id'=>$data->projectid]);
                                    }

                                },



                            ],

                        ],
                    ],
                ]); ?>
<!--                --><?//= Html::endForm();?>
            </div>
         <?php Pjax::end();?>
    </div>



</div>
