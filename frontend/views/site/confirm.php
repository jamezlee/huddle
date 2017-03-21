<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */
use frontend\controllers\SiteController;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\User;


$this->title = 'Verify';
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
                <h1>Thank you</h1>
                <?
                $request = Yii::$app->request;

                $id = $request->get('id');
                $key = $request->get('key');
                $ConfirmUser = new User();


                ?>
            </div>

        </div>
    </div>

</div>
