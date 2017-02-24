<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */
use frontend\controllers\SiteController;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\User;


$this->title = 'Confirm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">
    <h1><?= Html::encode($this->title) ?></h1>



    <div class="row">
        <div class="col-lg-5">
            <h1>Thank you</h1>
            <?
            $request = Yii::$app->request;

            $id = $request->get('id');
            $key = $request->get('key');
            $ConfirmUser = new User();





//            echo $id;
//            echo $key;
//            $ConfirmUser = new User();
//            $ConfirmUser->validateActivate($id,$key);
           // $_GET['key'];
            //Yii::$app->runAction('SiteController/actionConfirmKey', ['id' => $_GET['id'], 'key' => $_GET['auth_key']]);

            ?>
            <? //actionConfirm($_GET['id']?>
        </div>
    </div>
</div>
