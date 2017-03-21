<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
$userID=Yii::$app->user->identity->getId();
$currentUser=User::findOne(['id'=>$userID]);
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'firstname')->label('First Name')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'lastname')->label('Last Name')?>
    <?= $form->field($model, 'jobtitle')->textInput()?>
    <?= $form->field($model,'description')->textarea() ?>
    <?= $form->field($model, 'email')->label('Email') ?>
    <?= $form->field($model, 'username')->textInput() ?>
<!--    --><?//= $form->field($model, 'userrole')->textInput() ?>

<!--    --><?//= $form->field($model, 'userrole')->dropDownList([ 'System Admin' => 'System Admin', 'Project Owner' => 'Project Owner', 'User' => 'User', ], ['prompt' => '']) ?>

<!--    --><?//= $form->field($model, 'userrole')->dropDownList([ 'System Admin' => 'System Admin', 'Project Owner' => 'Project Owner', 'User' => 'User', ], ['prompt' => '']) ?>
   <?if ($currentUser->userrole=='System Admin'){
     echo  $form->field($model, 'userrole')->dropDownList([ 'System Admin' => 'System Admin', 'Project Owner' => 'Project Owner', 'User' => 'User', ], ['prompt' => '']);
   }else if ($currentUser->userrole=='Project Owner'){
       echo $form->field($model, 'userrole')->dropDownList([  'User' => 'User', ], ['prompt' => '']);
   }
    ?>

    <?= $form->field($model, 'password_hash')->passwordInput() ?>
    <?= $form->field($model, 'repeatnewpass')->passwordInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
