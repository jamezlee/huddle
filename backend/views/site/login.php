<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login ">
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>Please fill out the following fields to login:</p>-->
<!---->
<!--    <div class="row">-->
<!--        <div class="col-lg-5">-->
<!--            --><?php //$form = ActiveForm::begin(['id' => 'login-form']); ?>
<!---->
<!--                --><?//= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
<!---->
<!--                --><?//= $form->field($model, 'password')->passwordInput() ?>
<!---->
<!--                --><?//= $form->field($model, 'rememberMe')->checkbox() ?>
<!---->
<!--                <div class="form-group">-->
<!--                    --><?//= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
<!--                </div>-->
<!---->
<!--            --><?php //ActiveForm::end(); ?>
<!--        </div>-->
<!--    </div>-->

    <div class="login__block toggled" id="l-login">

            <div class="login__block__header">
                <i class="zmdi zmdi-account-circle"></i>
                Hi there! Please Sign in
                <div class="actions login__block__actions">
                    <div class="dropdown">
                        <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>
                        <?php

                        $menuItems[] =
                            '<li class="top-menu__profile dropdown">'
                           .' <a href="../index.php?r=site%2Fsignup">Sign Up</a>'
                            . '</li>';
                        $menuItems[] =
                        '<li class="top-menu__profile dropdown">'

                        .'<a href="../index.php?r=%2Fsite%2Frequest-password-reset">Forgot password?</a>'
                       // .'<a href= " 'Yii::$app->urlManagerFrontEnd->createUrl("index.php?r=site%2Frequest-password-reset");'" >Forgot password?</a>'
                      // .Html::a('Forgot password?', [  Yii::$app->urlManagerFrontEnd->createUrl('/site/request-password-reset')])

                       // .Html::a('Forgot password?', [ '/site/request-password-reset'])


                        . '</li>';
                        echo Nav::widget([
                            'encodeLabels'=>false,
                            'items' => $menuItems,
                            'options' => ['class' => 'dropdown-menu pull-right'],
                        ]);

                        ?>

                    </div>
                </div>
            </div>
            <div class="login__block__body">
                <?php  ?>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <div class="form-group form-group--float form-group--centered form-group--centered">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control']); ?>
                </div>

                <div class="form-group form-group--float form-group--centered form-group--centered">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>

                <button class="btn btn--light btn--icon m-t-15"><i class="zmdi zmdi-long-arrow-right"></i></button>
                <?php ActiveForm::end(); ?>


            </div>
        </div>
</div>
