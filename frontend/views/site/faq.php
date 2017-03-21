<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use backend\models\Cms;

$this->title = 'FAQ';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="jumbotron faq-bg">
    <div class="container">
        <div class="col-md-4 col-md-offset-4 text-center">

        </div>
    </div>
</div>
<div class="grey-bg">
    <div class="container">
        <div class="col-sm-12 text-left">
            <h1><?=$this->title?></h1>
            <?php
            $data = Cms::findOne(['id'=> 1]);
            echo $data ->faq;
            ?>
        </div>
    </div>

</div>


