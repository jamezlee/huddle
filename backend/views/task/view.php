<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $model backend\models\Task */
$sessionTask = Yii::$app->session;
if ($sessionTask->has('activityid')){
    unset($sessionTask['activityid']);

}

$this->title = $model->taskname;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">



    <div class="content">
        <div class="content-wrapper">

            <header class="content__header">
                <h1>Task: <?= $model->taskname ?></h1>

                <? $user = User::findOne(['id'=>$model->userid]);?>
                <h2>Task Owner: <?=$user->username ?> </h2>

            </header>

            <div class="card">
                <div class="row">
                    <div class="col-md-12">


                        <div class="row">
                            <div class="col-md-12">
                                <h3>Task description</h3>
                                <p><?= $model->taskdescription ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <h3>Task planned start date</h3>
                                <p><?= $model->taskplannedstartdate ?></p>
                            </div>
                            <div class="col-md-6">
                                <h3>Task planned end date</h3>
                                <p><?= $model->taskplannedenddate ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <h3>Task actual start date</h3>
                                <p><?= $model->taskactualstartdate ?></p>
                            </div>
                            <div class="col-md-6">
                                <h3>Task actual end date</h3>
                                <p><?= $model->taskplannedenddate ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Task Creation Date</h3>
                                <p><?= $model->creationdate ?></p>
                            </div>
                            <div class="col-md-12">
                                <h3>Task comments</h3>
                                <p><?= $model->comments ?></p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <h3>Task file</h3>
                                <? if ($model->taskfile!= ''){
                                    echo'<a href="'. Url::base(true).'/upload/'.$model->taskfile . '" <i class="zmdi zmdi-download"></i> Download (Right click and save)</a>';
                                }
                                else{
                                    echo'<p>There is no file</p>';
                                }
                                ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <p>
                                    <?
                                    $userid=Yii::$app->user->identity->getId();
                                    $userCurrent=User::findOne(['id'=>$userid]);

                                    echo Html::a('Edit', ['update', 'id' => $model->assignID], ['class' => 'btn btn-primary']) ?>


                                    <?

                                    if ($userCurrent->userrole=='Project Owner' || $userCurrent->userrole=='System Admin'){
                                        echo Html::a('Delete', ['delete', 'id' => $model->assignID], [
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

        </div>
    </div>




</div>
