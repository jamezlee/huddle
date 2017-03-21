<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use backend\models\User;
use backend\models\Task;
use backend\models\Activity;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $model backend\models\Project */

$this->title = $model->projectname;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$session = Yii::$app->session;
$session->set('projectid',$model->projectid);



?>
<div class="project-view">


    <div class="content">
        <div class="content-wrapper">

        <header class="content__header">
            <h1>Project: <?= $model->projectname ?></h1>

            <? $user = User::findOne(['id'=>$model->userid]);?>
            <h2>Project Owner: <?=$user->username ?> </h2>

        </header>


        <div class="card">
            <div class="row">

                <div class="col-md-12">


                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Project Classification</h3>
                                <p><?= $model->projectclassification ?></p>


                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Project Desription</h3>
                                <p><?= $model->projectdescription ?></p>

                            </div>
                        </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Planned start Date</h3>
                            <p><?= $model->projectplannedstartdate ?></p>

                        </div>
                        <div class="col-sm-6">
                            <h3>Planned end Date</h3>
                            <p><?= $model->projectplannedenddate ?></p>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Actual start Date</h3>
                            <p><?= $model->projectactualstartdate ?></p>

                        </div>
                        <div class="col-sm-6">
                            <h3>Actual end Date</h3>
                            <p><?= $model->projectactualenddate ?></p>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Creation Date</h3>
                            <p><?= $model->creationdate ?></p>

                        </div>
                        <div class="col-sm-6">
                            <h3>Project status</h3>
                            <p><?= $model->projectstatus ?></p>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <? if ($model->projectfile!= ''){
                                echo'<a href="'. Url::base(true).'/upload/'.$model->projectfile . '" <i class="zmdi zmdi-download"></i> Download (Right click and save)</a>';
                            }
                            else{
                                echo'<p>There is no file</p>';
                            }
                            ?>

<!--                            <a href="--><?//= Url::base(true).'/'.$model->projectfile ?><!--" <i class="zmdi zmdi-download"></i> Download (Right click and save)</a>-->
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-6 text-right">
                            <br/>
                            <p>
                                <?
                                $userid=Yii::$app->user->identity->getId();
                                $userCurrent=User::findOne(['id'=>$userid]);
                                if ($user->id==$userid || $userCurrent->userrole=='System Admin') {
                                    echo Html::a('Edit', ['update', 'id' => $model->projectid], ['class' => 'btn btn-primary']);
                                }
                                ?>
                                <?

                                if ($user->id==$userid || $userCurrent->userrole=='System Admin'){
                                    echo Html::a('Delete', ['delete', 'id' => $model->projectid], [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]);


                                }

                                ?>
                            </p>
                        </div>
                    </div>

                </div>



            </div>


        </div>

            <div class="card">

                <div class="row">
                    <div class="col-sm-6 col-sm-offset-6 text-right">
                        <?= Html::a('Create new activity', ['activity/create'],['class' => 'btn btn-success'])?>
                    </div>

                    <div class="col-sm-12">
                        <div class="panel-group" id="accordion">


                            <?php



                            $foundActivitys = Activity::findAll(['projectid' => $model->projectid]);
                            $x=1;
                            foreach ($foundActivitys as $foundActivity) {
                                $y=$foundActivity->activityid;
                               // echo "addMarker({$model->lat_field}, {$model->lon_field});";
                                echo '<div class="panel panel-collapse">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-'.$x.'">
                                                Activity Name: <strong>'
                                                   .  $foundActivity->activityname .

                                                '</strong></a>
                                                ' . Html::a('<i class="zmdi zmdi-edit"></i>',['activity/update','id'=>$foundActivity->activityid],['class'=>'icon']) .'
                                                ' . Html::a('<i class="zmdi zmdi-eye"></i>',['activity/view','id'=>$foundActivity->activityid],['class'=>'icon']) .'
                                                ' . Html::a('Add task', ['task/create'],['class'=>'btn btn-success']);
                                                 $sessionTask = Yii::$app->session;
                                                     $sessionTask->set('activityid',$foundActivity->activityid);
                                            echo'</h4>

                                        </div>
                                        <div id="collapse-'.$x.'" class="collapse in">';
                                        $foundTasks = Task::findAll(['activityid' => $y]);
                                          foreach ($foundTasks as $foundTask) {
                                            echo'<div class="panel-body">
                                                <h5>Task name: </h5>'
                                                . $foundTask->taskname.
                                                Html::a('<i class="zmdi zmdi-edit"></i>',['task/update','id'=>$foundTask->assignID],['class'=>'icon']) .
                                                Html::a('<i class="zmdi zmdi-eye"></i>',['task/view','id'=>$foundTask->assignID],['class'=>'icon']) .
                                                '</div>';

                                             }


//                                            '<div class="panel-body">
//                                            <h4>task list</h4>
//
//                                            </div>
//                                            <div class="panel-body">
//                                            <h4>task list</h4>
//
//                                            </div>
                                  echo   '</div>
                                    </div>';

                                    $x++;
                            }

                            ?>

                        </div>

                    </div>
<!--                    <div class="col-sm-12">-->
<!--                        --><?// $dataActivityProvider = new ActiveDataProvider([
//                            'query' => Activity::find()->where(['projectid' => $model->projectid]),
//
//                        ]);
//
//
//                        echo GridView::widget([
//                            'dataProvider' => $dataActivityProvider,
//                            //  'filterModel' => $searchModel,
//                            'columns' => [
//                                ['class' => 'yii\grid\SerialColumn'],
//                                //'taskid',
//                                'projectid',
//                                'activityname',
//                                'activitydescription',
//                                'activityplannedstartdate',
//                                'activityplannedenddate',
//                                'activityactualstartdate',
//                                'activityactualenddate',
//                                'creationdate',
//                                'activitystatus',
//                                'comments',
//
//                                ['class' => 'yii\grid\ActionColumn'],
//                            ],
//
//                        ]); ?>
<!--                    </div>-->
                </div>



            </div>

        </div>
    </div>

</div>
