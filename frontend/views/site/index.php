<?php

/* @var $this yii\web\View */

$this->title = 'huddle-home';
?>

<div class="jumbotron">
    <div class="container">
        <div class="col-md-4 col-md-offset-4 text-center">
            <img src="<?=  Yii::$app->request->baseUrl ?>/images/logo_huddle_large.png"  width="100%" class="img-reponsive"/>

            <h3>Our Best Product Ever</h3>
            <?= \yii\helpers\Html::a('Learn More',['/site/signup'],['class'=>'btn btn-success'])?>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-4 col-md-offset-4 text-center">
            <i class="zmdi zmdi-edit zmdi-hc-5x"></i>
            <h2>Manage your project with customized tools and resources.</h2>
            <p>Have you ever wondered how elements come together to create successful design? It's no accident that commpelling design just seems to work.</p>
            <br />
        </div>
    </div>
</div>

<div class="grey-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2> Breaking Out of the Box </h2><br />
            </div>
            <div class="col-sm-4 text-center">
                <i class="zmdi zmdi-crop zmdi-hc-4x"></i><br />
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
            </div>
            <div class="col-sm-4 text-center">
                <i class="zmdi zmdi-mood zmdi-hc-4x"></i><br />
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
            </div>
            <div class="col-sm-4 text-center">
                <i class="zmdi zmdi-run zmdi-hc-4x"></i><br />
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
            </div>
        </div>
    </div>
</div><!-- /container -->

