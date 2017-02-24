<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;

use backend\models\Project;
use backend\models\Task;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

$this->title = 'Huddle';


?>
<div class="content__wrapper">
    <div class="content__title">
        <h1>Dashboard</h1>

    </div>
    <div class="card">
        <div class="card__body">
            <div class="row">
                <div class="col-md-3">
                    <p>Inprocess Project</p>
                    <?php
                    $inproProject = Project::findAll(['projectstatus'=>'Inprocess']);
                    $completeProject  = Project::findAll(['projectstatus'=>'Completed']);
                    $totalProject = count($inproProject) + count($completeProject);
                    if($totalProject<=0){
                        $percent=0;
                    }else{
                        $percent=(count($inproProject)/$totalProject)*100;
                    }
                    ?>

                    <div class="chart-pie" data-percent="<?=  $percent ?>" data-pie-size="230">
                        <span class="chart-pie__value"><?= $percent ?></span>
                    </div>

                </div>
                <div class="col-md-9">
                    <?
                    $dataProvider = new ActiveDataProvider([
                        'query' => Project::find()->where(['projectstatus' => 'Inprocess']),

                    ]);


                   echo GridView::widget([

                        'dataProvider' => $dataProvider,
                        'emptyText' => '',
                      //  'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute'=>'projectname',

                               // 'value'=>'Project.projectname'
                            ],

                            //'projectid',


                            // 'projectclassification',
                            //'projectdescription:html',
                            //'projectplannedstartdate',
                            //'projectplanedenddate',
                            'projectactualstartdate',
                            'projectactualenddate',
                            // 'createdate',
                            // 'userid',
                            'projectstatus',

                           // ['class' => 'yii\grid\ActionColumn'],
                        ],
                        'summary'=>'',
                    ]); ?>
                </div>
            </div>
            <div class="row">
               <div class="col-md-12">

                   <?= GridView::widget([
                       'dataProvider' => $dataActivityProvider,
                       //  'filterModel' => $searchModel,
                       'columns' => [
                           ['class' => 'yii\grid\SerialColumn'],
//                           'activityid',
//                           'projectid',
                           'activityname',
                           'activitydescription',
//                           'activityplannedstartdate',
//                           'activityplannedenddate',
//                           'activityactualstartdate',
//                           'activityactualenddate',
                           'creationdate',
                           'activitystatus',
                           'comments',

                           ['class' => 'yii\grid\ActionColumn'],
                       ],
                       'summary'=>'Task',
                   ]); ?>

               </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <h2>Task Assigned <? echo Yii::$app->user->identity->getId(); ?></h2>
                    <?
                    $dataTaskassignProvider = new ActiveDataProvider([
                        'query' => Task::find()->where(['userid' =>  Yii::$app->user->identity->getId()]),

                    ]);
                    echo GridView::widget([
                        'dataProvider' => $dataTaskProvider,
                        //  'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'assignID',
                            'userid',
                            //'taskid',
                            'taskdescription',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                        'summary'=>'Task',
                    ]); ?>

                </div>
            </div>


        </div>




    </div>


</div>
