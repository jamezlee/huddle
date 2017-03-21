<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Project;
/* @var $this yii\web\View */
/* @var $model backend\models\Activity */
$session = Yii::$app->session;
if ($session->has('projectid')){
    unset($session['projectid']);

}

$this->title = $model->activityname;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-view">

    <div class="content">
        <div class="content-wrapper">
            <header class="content__header">
                <h1>Activity: <?= $model->activityname ?></h1>

                <? $project = Project::findOne(['projectid'=>$model->projectid]);?>
                <h2>Project Name: <?=$project->projectname ?> </h2>

            </header>
            <div class="card">
                <div class="row">

                    <div class="col-md-12">



                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Activity description:</h3>
                                <p><?= $model->activitydescription ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>Activity planned start date:</h3>
                                <p><?= $model->activityplannedstartdate ?></p>
                            </div>
                            <div class="col-sm-6">
                                <h3>Activity planned end date:</h3>
                                <p><?= $model->activityplannedenddate ?></p>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                                <h3>Activity actual start date:</h3>
                                <p><?= $model->activityactualstartdate ?></p>
                            </div>
                            <div class="col-sm-6">
                                <h3>Activity actual end date:</h3>
                                <p><?= $model->activityactualenddate ?></p>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                                <h3>Activity creation date:</h3>
                                <p><?= $model->creationdate ?></p>
                            </div>
                            <div class="col-sm-6">
                                <h3>Activity status:</h3>
                                <p><?= $model->activitystatus ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Activity comment:</h3>
                                <p><?= $model->comments ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-offset-6 text-right">
                                <p>
                                    <?= Html::a('Edit', ['update', 'id' => $model->activityid], ['class' => 'btn btn-primary']) ?>
                                    <?= Html::a('Delete', ['delete', 'id' => $model->activityid], [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                    <?=
                                    Html::a('Add task', ['task/create'],['class'=>'btn btn-success']);
                                    $sessionTask = Yii::$app->session;
                                    $sessionTask->set('activityid',$model->activityid);

                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






<!--    --><?//= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            //'activityid',
//            //'projectid',
//            'activityname',
//            'activitydescription',
//            'activityplannedstartdate',
//            'activityplannedenddate',
//            'activityactualstartdate',
//            'activityactualenddate',
//            'creationdate',
//            'activitystatus',
//            'comments',
//        ],
//    ]) ?>

</div>
