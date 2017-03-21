<?php

/* @var $this yii\web\View */
use backend\models\Cms;
use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jumbotron yellow-bg">
    <div class="container">
        <div class="col-md-4 col-md-offset-4 text-center">
            <?php
            $data = Cms::findOne(['id'=> 1]);
            echo $data ->aboutus;
            ?>

        </div>
    </div>
</div>
<div class="grey-bg">
    <div class="container">
        <div class="col-sm-4 text-center">
            <img src="<?=  Yii::$app->request->baseUrl ?>/images/louis.jpg"  width="100%" class="img-reponsive img-circle"/>
            <br/>
            <h4>Louis Chen</h4>
            <P>Project Manager</P>
        </div>
        <div class="col-sm-4 text-center">
            <img src="<?=  Yii::$app->request->baseUrl ?>/images/nick.jpg"  width="100%" class="img-reponsive img-circle"/>
            <br/>
            <h4>Nicol Loh</h4>
            <P>Project Manager</P>
        </div>
        <div class="col-sm-4 text-center">
            <img src="<?=  Yii::$app->request->baseUrl ?>/images/zhoa.jpg"  width="100%" class="img-reponsive img-circle"/>
            <br/>
            <h4>Zhao Peng</h4>
            <P>Lead Developer</P>
        </div>
        <div class="col-sm-4 text-center">
            <img src="<?=  Yii::$app->request->baseUrl ?>/images/norman.jpg"  width="100%" class="img-reponsive img-circle"/>
            <br/>
            <h4>Norman Sek</h4>
            <P>Project Manager</P>
        </div>
        <div class="col-sm-4 text-center">
            <img src="<?=  Yii::$app->request->baseUrl ?>/images/abel.jpg"  width="100%" class="img-reponsive img-circle"/>
            <br/>
            <h4>Abel</h4>
            <P>UX / UI</P>
        </div>
        <div class="col-sm-4 text-center">
            <img src="<?=  Yii::$app->request->baseUrl ?>/images/james.jpg"  width="100%" class="img-reponsive img-circle"/>
            <br/>
            <h4>James Lee</h4>
            <P>Full Stack Developer</P>
        </div>

    </div>

</div>
