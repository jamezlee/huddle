<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group">
                <div class="top-search">
                    <?= $form->field($model, 'globalTaskSearch')->label("")->textInput(['class'=>'top-search__input','placeholder'=>'search for Task Name']) ?>
                    <i class="zmdi zmdi-search top-search__reset"></i>
                </div>


            </div>

        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <div class="btn-search">
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>

                </div>

            </div>
        </div>

    </div>
<!--    --><?//= $form->field($model, 'assignID') ?>
<!---->
<!--    --><?//= $form->field($model, 'userid') ?>
<!---->
<!--    --><?//= $form->field($model, 'activityid') ?>
<!---->
<!--    --><?//= $form->field($model, 'taskname') ?>
<!---->
<!--    --><?//= $form->field($model, 'taskdescription') ?>

    <?php // echo $form->field($model, 'taskplannedstartdate') ?>

    <?php // echo $form->field($model, 'taskplannedenddate') ?>

    <?php // echo $form->field($model, 'taskactualstartdate') ?>

    <?php // echo $form->field($model, 'taskactualenddate') ?>

    <?php // echo $form->field($model, 'creationdate') ?>

    <?php // echo $form->field($model, 'taskstatus') ?>

    <?php // echo $form->field($model, 'taskfile') ?>

    <?php // echo $form->field($model, 'comments') ?>



    <?php ActiveForm::end(); ?>

</div>
