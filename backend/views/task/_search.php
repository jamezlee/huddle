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

    <?= $form->field($model, 'assignID') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'activityid') ?>

    <?= $form->field($model, 'taskname') ?>

    <?= $form->field($model, 'taskdescription') ?>

    <?php // echo $form->field($model, 'taskplannedstartdate') ?>

    <?php // echo $form->field($model, 'taskplannedenddate') ?>

    <?php // echo $form->field($model, 'taskactualstartdate') ?>

    <?php // echo $form->field($model, 'taskactualenddate') ?>

    <?php // echo $form->field($model, 'creationdate') ?>

    <?php // echo $form->field($model, 'taskstatus') ?>

    <?php // echo $form->field($model, 'taskfile') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
