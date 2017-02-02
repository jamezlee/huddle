<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'firstname')->label('First Name')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'lastname')->label('Last Name')?>
    <?= $form->field($model, 'jobtitle')->textInput()?>
    <?= $form->field($model,'description')->textarea() ?>
    <?= $form->field($model, 'email')->label('Email') ?>
    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'password_hash')->passwordInput() ?>
    <?= $form->field($model, 'repeatnewpass')->passwordInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
