<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use common\widgets\Alert;
use backend\models\User;
use backend\models\UserSearch;

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
    <?php $this->head() ?>
</head>
<body>
<!-- Page Loader -->
<div id="page-loader">
    <div class="preloader preloader--xl preloader--light">
        <svg viewBox="25 25 50 50">
            <circle cx="50" cy="50" r="20" />
        </svg>
    </div>
</div>

<?php $this->beginBody() ?>
<!-- Header -->
<header id="header">
    <div class="logo">
        <a href="index.php" class="hidden-xs">
            <?php echo Html::img('@web/images/logo_huddle.png') ?>

        </a>
        <i class="logo__trigger zmdi zmdi-menu" data-mae-action="block-open" data-mae-target="#navigation"></i>
    </div>
    <?php





    ?>
    <!---->
    <!---->
    <!--    <form class="top-search">-->
    <!--        <input type="text" class="top-search__input" placeholder="Search for people, files & reports">-->
    <!--        <i class="zmdi zmdi-search top-search__reset"></i>-->
    <!--    </form>-->
</header>
<section id="main">


    <aside id="navigation">
        <div class="navigation__header">
            <i class="zmdi zmdi-long-arrow-left" data-mae-action="block-close"></i>
        </div>



        <div class="navigation__menu c-overflow">
            <?php
            //$user= new User();


            $userid=Yii::$app->user->identity->getId();

            $usertest = User::findOne(['id'=>Yii::$app->user->identity->getId()]);
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] =

                    '<li class="top-menu__profile dropdown">'
                    . ' <a data-toggle="dropdown" href="">'
                    . Html::img('@web/images/1.jpg')
                    //.'<img src="demo/img/profile-pics/1.jpg" alt="">'
                    . '</a>'
                    . '<ul class="dropdown-menu pull-right dropdown-menu--icon">'
                    . '<li>
                    <a href="?r=user/view&id='. $userid .' "><i class="zmdi zmdi-account"></i> View Profile</a>
                     </li>'
                    . '<li>'

                    . Html::a('<i class="zmdi zmdi-time-restore"></i> Logout (' . Yii::$app->user->identity->username . ')', ['site/logout'], ['data' => ['method' => 'post']])
                    . '</li>'

                    . ' </ul>'

                    . '</li>';

            }


            // echo $usertest->userrole;
            if($usertest->userrole=="Project Owner" || $usertest->userrole=="User" ){
                $menuItems[]=['label' => '<i class="zmdi zmdi-view-dashboard"></i> Dashboard', 'url' => ['/site/index']];
            }
            if($usertest->userrole=="Project Owner" || $usertest->userrole=="System Admin"){
                $menuItems []=['label' => '<i class="zmdi zmdi-assignment-account"></i> Project',  'url' => ['project/']];
            }
            if($usertest->userrole=="Project Owner" || $usertest->userrole=="System Admin"){
                $menuItems []=['label' => '<i class="zmdi zmdi-ticket-star"></i> Activity',  'url' => ['activity/']];
            }

            if($usertest->userrole=="Project Owner" || $usertest->userrole=="User" || $usertest->userrole=="System Admin"){
                $menuItems[]=['label' => '<i class="zmdi zmdi-assignment-o"></i> Task', 'url' => ['/task/']];
            }
            if($usertest->userrole=="Project Owner" || $usertest->userrole=="System Admin") {

                $menuItems []=['label' => '<i class="zmdi zmdi-account-o"></i> User', 'url' => ['/user/']];

            }


            if($usertest->userrole=="System Admin") {

                $menuItems []=['label' => '<i class="zmdi zmdi-text-format"></i> CMS', 'url' => ['/cms/']];

            }

            $menuItems []= '<li>'.  Html::a('<i class="zmdi zmdi-comments"></i> Forum', ['topic/']) .'</li>';

            $menuItems []= '<li>'.  Html::a('<i class="zmdi zmdi-time-restore"></i> Logout (' . Yii::$app->user->identity->username . ')', ['site/logout'], ['data' => ['method' => 'post']]) .'</li>';



            echo Nav::widget([
                'encodeLabels'=>false,
                'items' => $menuItems,
            ]);

            ?>
        </div>
    </aside>

    <section id="content">

        <?= $content ?>




        </div>
    </section>



    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
