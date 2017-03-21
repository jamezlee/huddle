<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


    <?php
    NavBar::begin([
        'brandLabel' => '<a class="navbar-brand" ><img src="'.Yii::$app->request->baseUrl.'/images/logo_huddle.png" /></a>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-static-top',
        ],
    ]);


    $menuItemleft = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About Us', 'url' => ['/site/about']],
        ['label' => 'FAQ', 'url' => ['/site/faq']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];



    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = '<li><a href="admin/">Login</a></li>';
       // $menuItems[] = ['label' => 'Login', 'url' => ['admin/index']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav'],
        'items' => $menuItemleft,
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>





<!--        --><?//= Breadcrumbs::widget([
//            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//        ]) ?>
<!--        --><?//= Alert::widget() ?>
        <?= $content ?>




<?php $this->endBody() ?>

<div class="footer-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <ul>
                    <li><?= html::a("Home",['/site/index'])?></li>
                    <li><?= html::a("About Us",['/site/about'])?></li>
                    <li><?= html::a("FAQ",['/site/about'])?></li>
                    <li><?= html::a("Contact Us",['/site/contact'])?></li>
                </ul>
            </div>
        </div>

    </div>

</div>
</body>
</html>
<?php $this->endPage() ?>
