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
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <div class="top-search">
                    <?= $form->field($model, 'globalActivitySearch')->label("")->textInput(['class'=>'top-search__input','placeholder'=>'search for activity']) ?>
                    <i class="zmdi zmdi-search top-search__reset"></i>
                </div>
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>


            </div>

        </div>

    </div>
<!--    --><?//= $form->field($model, 'activityid') ?>
<!---->
<!--    --><?//= $form->field($model, 'projectid') ?>
<!---->
<!--    --><?//= $form->field($model, 'activityname') ?>
<!---->
<!--    --><?//= $form->field($model, 'activitydescription') ?>
<!---->
<!--    --><?//= $form->field($model, 'activityplannedstartdate') ?>
<!---->
<!--    --><?php //// echo $form->field($model, 'activityplannedenddate') ?>
<!---->
<!--    --><?php //// echo $form->field($model, 'activityactualstartdate') ?>
<!---->
<!--    --><?php //// echo $form->field($model, 'activityactualenddate') ?>
<!---->
<!--    --><?php //// echo $form->field($model, 'creationdate') ?>
<!---->
<!--    --><?php //// echo $form->field($model, 'activitystatus') ?>
<!---->
<!--    --><?php //// echo $form->field($model, 'comments') ?>


    <?php ActiveForm::end(); ?>

</div>
