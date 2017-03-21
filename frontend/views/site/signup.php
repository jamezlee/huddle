<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="jumbotron">
        <div class="container">
            <div class="col-md-4 col-md-offset-4 text-center">
                <img src="<?=  Yii::$app->request->baseUrl ?>/images/logo_huddle_large.png"  width="100%" class="img-reponsive"/>

                <h3><?= Html::encode($this->title) ?></h3>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <p>Please fill out the following fields to signup:</p>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>


                <?= $form->field($model, 'firstname')->label('First Name') ?>
                <?= $form->field($model, 'lastname')->label('Last Name')?>

                <?= $form->field($model, 'email')->label('Email') ?>

                <?= $form->field($model, 'jobtitle')->label('Job Title')?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password')->passwordInput()->label('Password') ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>



    </div>


</div>
