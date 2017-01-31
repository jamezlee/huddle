<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'projectid') ?>

    <?= $form->field($model, 'projectname') ?>

    <?= $form->field($model, 'projectclassification') ?>

    <?= $form->field($model, 'projectdescription') ?>

    <?= $form->field($model, 'projectplanedstartdate') ?>

    <?php // echo $form->field($model, 'projectplanedenddate') ?>

    <?php // echo $form->field($model, 'projectactualstartdate') ?>

    <?php // echo $form->field($model, 'projectactualenddate') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'userid') ?>

    <?php // echo $form->field($model, 'projectstatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
