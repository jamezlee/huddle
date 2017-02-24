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
        <a href="index.html" class="hidden-xs">
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
<!--<aside id="notifications">-->
<!--    <ul class="tab-nav tab-nav--justified tab-nav--icon">-->
<!--        <li><a class="user-alert__messages" href="#notifications__messages" data-toggle="tab"><i class="zmdi zmdi-email"></i></a></li>-->
<!--        <li><a class="user-alert__notifications" href="#notifications__updates" data-toggle="tab"><i class="zmdi zmdi-notifications"></i></a></li>-->
<!--        <li><a class="user-alert__tasks" href="#notifications__tasks" data-toggle="tab"><i class="zmdi zmdi-playlist-plus"></i></a></li>-->
<!--    </ul>-->
<!---->
<!--    <div class="tab-content">-->
<!--        <div class="tab-pane" id="notifications__messages">-->
<!--            <div class="list-group">-->
<!--                <a href="" class="list-group-item media">-->
<!--                    <div class="pull-left">-->
<!--                        <img class="avatar-img" src="demo/img/profile-pics/1.jpg" alt="">-->
<!--                    </div>-->
<!---->
<!--                    <div class="media-body">-->
<!--                        <div class="list-group__heading">David Villa Jacobs</div>-->
<!--                        <small class="list-group__text">Sorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis lobortis sapien non posuere</small>-->
<!--                    </div>-->
<!--                </a>-->
<!---->
<!--                <a href="" class="list-group-item media">-->
<!--                    <div class="pull-left">-->
<!--                        <img class="avatar-img" src="demo/img/profile-pics/5.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="media-body">-->
<!--                        <div class="list-group__heading">Candice Barnes</div>-->
<!--                        <small class="list-group__text">Quisque non tortor ultricies, posuere elit id, lacinia purus curabitur.</small>-->
<!--                    </div>-->
<!--                </a>-->
<!---->
<!--                <a href="" class="list-group-item media">-->
<!--                    <div class="pull-left">-->
<!--                        <img class="avatar-img" src="demo/img/profile-pics/3.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="media-body">-->
<!--                        <div class="list-group__heading">Jeannette Lawson</div>-->
<!--                        <small class="list-group__text">Donec congue tempus ligula, varius hendrerit mi hendrerit sit amet. Duis ac quam sit amet leo feugiat iaculis</small>-->
<!--                    </div>-->
<!--                </a>-->
<!---->
<!--                <a href="" class="list-group-item media">-->
<!--                    <div class="pull-left">-->
<!--                        <img class="avatar-img" src="demo/img/profile-pics/4.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="media-body">-->
<!--                        <div class="list-group__heading">Darla Mckinney</div>-->
<!--                        <small class="list-group__text">Duis tincidunt augue nec sem dignissim scelerisque. Vestibulum rhoncus sapien sed nulla aliquam lacinia</small>-->
<!--                    </div>-->
<!--                </a>-->
<!---->
<!--                <a href="" class="list-group-item media">-->
<!--                    <div class="pull-left">-->
<!--                        <img class="avatar-img" src="demo/img/profile-pics/2.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="media-body">-->
<!--                        <div class="list-group__heading">Rudolph Perez</div>-->
<!--                        <small class="list-group__text">Phasellus a ullamcorper lectus, sit amet viverra quam. In luctus tortor vel nulla pharetra bibendum</small>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!---->
<!--            <a href="" class="btn btn--float">-->
<!--                <i class="zmdi zmdi-plus"></i>-->
<!--            </a>-->
<!--        </div>-->
<!---->
<!--        <div class="tab-pane" id="notifications__updates">-->
<!--            <div class="list-group">-->
<!--                <a href="" class="list-group-item media">-->
<!--                    <div class="pull-right">-->
<!--                        <img class="avatar-img" src="demo/img/profile-pics/1.jpg" alt="">-->
<!--                    </div>-->
<!---->
<!--                    <div class="media-body">-->
<!--                        <div class="list-group__heading">David Villa Jacobs</div>-->
<!--                        <small class="list-group__text">Sorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis lobortis sapien non posuere</small>-->
<!--                    </div>-->
<!--                </a>-->
<!---->
<!--                <a href="" class="list-group-item">-->
<!--                    <div class="list-group__heading">Candice Barnes</div>-->
<!--                    <small class="list-group__text">Quisque non tortor ultricies, posuere elit id, lacinia purus curabitur.</small>-->
<!--                </a>-->
<!---->
<!--                <a href="" class="list-group-item">-->
<!--                    <div class="list-group__heading">Jeannette Lawson</div>-->
<!--                    <small class="list-group__text">Donec congue tempus ligula, varius hendrerit mi hendrerit sit amet. Duis ac quam sit amet leo feugiat iaculis</small>-->
<!--                </a>-->
<!---->
<!--                <a href="" class="list-group-item media">-->
<!--                    <div class="pull-right">-->
<!--                        <img class="avatar-img" src="demo/img/profile-pics/4.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="media-body">-->
<!--                        <div class="list-group__heading">Darla Mckinney</div>-->
<!--                        <small class="list-group__text">Duis tincidunt augue nec sem dignissim scelerisque. Vestibulum rhoncus sapien sed nulla aliquam lacinia</small>-->
<!--                    </div>-->
<!--                </a>-->
<!---->
<!--                <a href="" class="list-group-item media">-->
<!--                    <div class="pull-right">-->
<!--                        <img class="avatar-img" src="demo/img/profile-pics/2.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="media-body">-->
<!--                        <div class="list-group__heading">Rudolph Perez</div>-->
<!--                        <small class="list-group__text">Phasellus a ullamcorper lectus, sit amet viverra quam. In luctus tortor vel nulla pharetra bibendum</small>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="tab-pane" id="notifications__tasks">-->
<!--            <div class="list-group">-->
<!--                <div class="list-group-item">-->
<!--                    <div class="list-group__heading m-b-5">HTML5 Validation Report</div>-->
<!---->
<!--                    <div class="progress">-->
<!--                        <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%">-->
<!--                            <span class="sr-only">95% Complete (success)</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="list-group-item">-->
<!--                    <div class="list-group__heading m-b-5">Google Chrome Extension</div>-->
<!---->
<!--                    <div class="progress">-->
<!--                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">-->
<!--                            <span class="sr-only">80% Complete (success)</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="list-group-item">-->
<!--                    <div class="list-group__heading m-b-5">Social Intranet Projects</div>-->
<!---->
<!--                    <div class="progress">-->
<!--                        <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">-->
<!--                            <span class="sr-only">20% Complete</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="list-group-item">-->
<!--                    <div class="list-group__heading m-b-5">Bootstrap Admin Template</div>-->
<!---->
<!--                    <div class="progress">-->
<!--                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">-->
<!--                            <span class="sr-only">60% Complete (warning)</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="list-group-item">-->
<!--                    <div class="list-group__heading m-b-5">Youtube Client App</div>-->
<!---->
<!--                    <div class="progress">-->
<!--                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">-->
<!--                            <span class="sr-only">80% Complete (danger)</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <a href="" class="btn btn--float">-->
<!--                <i class="zmdi zmdi-plus"></i>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--</aside>-->

<aside id="navigation">
    <div class="navigation__header">
        <i class="zmdi zmdi-long-arrow-left" data-mae-action="block-close"></i>
    </div>



    <div class="navigation__menu c-overflow">
        <?php
        //$user= new User();


        $userid=Yii::$app->user->identity->getId();

        $usertest = User::findOne(['id'=>$userid]);
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

        $menuItems[]=['label' => '<i class="zmdi zmdi-view-dashboard"></i> Dashboard', 'url' => ['/site/index']];
        if($usertest->userrole=="Project Owner" || $usertest->userrole=="System Admin"){
            $menuItems []=['label' => '<i class="zmdi zmdi-assignment-account"></i> Project',  'url' => ['project/']];
        }
        if($usertest->userrole=="Project Owner" || $usertest->userrole=="System Admin"){
            $menuItems []=['label' => '<i class="zmdi zmdi-ticket-star"></i> Activity',  'url' => ['activity/']];
        }

        if($usertest->userrole=="Project Owner" || $usertest->userrole=="User"){
            $menuItems[]=['label' => '<i class="zmdi zmdi-assignment-o"></i> Task', 'url' => ['/task/']];
        }

        $menuItems []=['label' => '<i class="zmdi zmdi-account-o"></i> User', 'url' => ['/user/']];
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
