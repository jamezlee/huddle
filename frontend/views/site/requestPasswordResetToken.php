<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">

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
            <div class="col-md-6">
                <br>
                <p>Please fill out your email. A link to reset password will be sent there.</p>
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>




</div>
