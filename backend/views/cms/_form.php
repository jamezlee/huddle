<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Cms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'aboutus')->widget(CKEditor::className(), [
        'options' => ['rows' => 12],
        'preset' => 'full'
    ]) ?>


    <?= $form->field($model, 'faq')->widget(CKEditor::className(), [
        'options' => ['rows' => 12],
        'preset' => 'full'
    ]) ?>

    <?= $form->field($model, 'contactus')->widget(CKEditor::className(), [
        'options' => ['rows' => 12],
        'preset' => 'full'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
