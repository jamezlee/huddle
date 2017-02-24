<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ActivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'activityid') ?>

    <?= $form->field($model, 'projectid') ?>

    <?= $form->field($model, 'activityname') ?>

    <?= $form->field($model, 'activitydescription') ?>

    <?= $form->field($model, 'activityplannedstartdate') ?>

    <?php // echo $form->field($model, 'activityplannedenddate') ?>

    <?php // echo $form->field($model, 'activityactualstartdate') ?>

    <?php // echo $form->field($model, 'activityactualenddate') ?>

    <?php // echo $form->field($model, 'creationdate') ?>

    <?php // echo $form->field($model, 'activitystatus') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
