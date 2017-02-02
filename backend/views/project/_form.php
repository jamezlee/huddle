<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'projectname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'projectclassification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'projectdescription')->textarea(['rows' => '6']) ?>




    <?= $form->field($model, 'projectplanedstartdate')->textInput() ?>

    <?= $form->field($model, 'projectplanedenddate')->textInput() ?>

    <?= $form->field($model, 'projectactualstartdate')->textInput() ?>

    <?= $form->field($model, 'projectactualenddate')->textInput() ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <?= $form->field($model, 'userid')->textInput() ?>

    <?= $form->field($model, 'projectstatus')->dropDownList([ 'Inprocess' => 'Inprocess', 'Completed' => 'Completed', 'Canceled' => 'Canceled', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
