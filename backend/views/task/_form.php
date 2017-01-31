<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\models\Project;
/* @var $this yii\web\View */
/* @var $model backend\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'projectid')->textInput() ?>
    <?= $form->field($model, 'projectid')->dropDownList(
            ArrayHelper::map(Project::find()->all(), 'projectid', 'projectname'),
            ['prompt'=>'Select Project']

    ) ?>

    <?= $form->field($model, 'taskname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taskdescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taskplanedstartdate')->textInput() ?>

    <?= $form->field($model, 'taskplanedenddate')->textInput() ?>

    <?= $form->field($model, 'taskactualstartdate')->textInput() ?>

    <?= $form->field($model, 'taskactualenddate')->textInput() ?>

    <?= $form->field($model, 'taskstatus')->dropDownList([ 'Inprocess' => 'Inprocess', 'Completed' => 'Completed', 'Canceled' => 'Canceled', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
