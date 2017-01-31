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

    <?= $form->field($model, 'taskid') ?>

    <?= $form->field($model, 'projectid') ?>

    <?= $form->field($model, 'taskname') ?>

    <?= $form->field($model, 'taskdescription') ?>

    <?= $form->field($model, 'taskplanedstartdate') ?>

    <?php // echo $form->field($model, 'taskplanedenddate') ?>

    <?php // echo $form->field($model, 'taskactualstartdate') ?>

    <?php // echo $form->field($model, 'taskactualenddate') ?>

    <?php // echo $form->field($model, 'taskstatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
