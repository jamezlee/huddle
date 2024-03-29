<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use backend\models\Cms;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">




</div>
<div class="jumbotron contact-bg">
    <div class="container">
        <div class="col-md-4 col-md-offset-4 text-center">

        </div>
    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
            <h1><?= Html::encode($this->title) ?></h1>

            <?php
            $data = Cms::findOne(['id'=> 1]);
            echo $data ->contactus;
            ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                        <br>

                    </div>
                    <div class="col-md-12">
                        <?= $form->field($model, 'email') ?>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <?= $form->field($model, 'subject') ?><br>


                        <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
                        <br>
                    </div>
                </div>


                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-md-6">{image}</div><div class="col-md-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>


</div>