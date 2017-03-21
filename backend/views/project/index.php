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

$this->title = 'List of Projects';
 $this->params['breadcrumbs'][] = $this->title;


?>
<div class="project-index">

    <div class="card"><?php Pjax::begin();?>
            <div class="card__header">
                <h1><?= Html::encode($this->title) ?></h1>

                <?= Alert::widget() ?>

                <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="card__body">

                <?
                $userid=Yii::$app->user->identity->getId();
                $user = User::findOne(['id'=>$userid]);

//                if($user->userrole=="Project Owner"){
//                    $dataProvider = new ActiveDataProvider([
//                        'query' => Project::find()->where(['userid' => Yii::$app->user->identity->getId()]),
//
//                    ]);
//                }


                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel'=>$searchModel,
                    'rowOptions'=>function($model,$index,$widget,$grid){
                        $time = new DateTime('now');
                        $future = new DateTime('now');
                        $future->modify('+5 day');
                        $today=$time->format('Y-m-d');
                        $diff=strtotime($model->projectactualenddate)-strtotime($today);
                        $days = floor($diff / (60*60*24) );
                        //  echo $days .'<br>';
                        if($days <= 5 && $days > 0 ){
                            return ['class'=>'warning' ];
                        }else if($diff <= 0){
                            return ['class'=>'danger'];
                        }

                    },
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute'=>'projectname',
                            'format'=>'raw',
                            'value' => function ($data) {
                                $userid=Yii::$app->user->identity->getId();
                                $usertest = User::findOne(['id'=>$userid]);
                                if($usertest->userrole == 'Project Owner'||$usertest->userrole == 'System Admin' ){
                                return Html::a($data->projectname,['project/view','id'=>$data->projectid]);
                                }
                                else{
                                    return $data->projectname;
                                }
                            },
                        ],
                        //'projectclassification',
                        'projectdescription:html',
                        'projectplannedstartdate',
                        'projectplannedenddate',
                        'projectactualstartdate',
                        'projectactualenddate',
                        //'creationdate',
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
                                        return Html::a('<span class="fa fa-pencil"></span>Update',['project/update','id'=>$data->projectid]);
                                    }

                                },
                                'delete' => function ($data) {
                                    $userid=Yii::$app->user->identity->getId();
                                    $usertest = User::findOne(['id'=>$userid]);
                                    if($usertest->userrole == 'Project Owner' || $usertest->userrole == 'System Admin'){
                                        return Html::a('<span class="fa  fa-trash"></span>delete',['project/delete','id'=>$data->projectid]);
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
