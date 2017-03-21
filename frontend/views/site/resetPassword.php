<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">

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
            <div class="col-lg-5">
                <br>
                <p>Please choose your new password:</p>
                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>



</div>
