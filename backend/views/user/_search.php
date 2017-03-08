<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <div class="top-search">
                    <?= $form->field($model, 'globalUserSearch')->label("")->textInput(['class'=>'top-search__input','placeholder'=>'search for User name / description / user first name / user last name ']) ?>
                    <i class="zmdi zmdi-search top-search__reset"></i>
                </div>
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>


            </div>

        </div>

    </div>
<!--    --><?//= $form->field($model, 'id') ?>
<!---->
<!--    --><?//= $form->field($model, 'firstname') ?>
<!---->
<!--    --><?//= $form->field($model, 'lastname') ?>
<!---->
<!--    --><?//= $form->field($model, 'jobtitle') ?>
<!---->
<!--    --><?//= $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

<!--    <div class="form-group">-->
<!--        --><?//= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
<!--    </div>-->

    <?php ActiveForm::end(); ?>

</div>
