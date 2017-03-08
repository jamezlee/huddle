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


<div class="row">
    <div class="col-sm-10">
        <div class="form-group">
            <div class="top-search">
                <?= $form->field($model, 'globalProjectSearch')->label("")->textInput(['class'=>'top-search__input','placeholder'=>'search for Project Name, Username, Project Status, Planned Start or End Date , Actual Start or End Date']) ?>
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


    <!--    --><?//= $form->field($model, 'projectid') ?>

<!--    --><?//= $form->field($model, 'projectname') ?>
<!---->
<!--    --><?//= $form->field($model, 'projectclassification') ?>
<!---->
<!--    --><?//= $form->field($model, 'projectdescription') ?>
<!---->
<!--    --><?//= $form->field($model, 'projectplanedstartdate') ?>

    <?php // echo $form->field($model, 'projectplanedenddate') ?>

    <?php // echo $form->field($model, 'projectactualstartdate') ?>

    <?php // echo $form->field($model, 'projectactualenddate') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'userid') ?>

    <?php // echo $form->field($model, 'projectstatus') ?>



    <?php ActiveForm::end(); ?>

</div>
