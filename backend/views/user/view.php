<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\User;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->username;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">



    <div class="content--boxed-sm">

        <header class="content__header">
            <?= Alert::widget() ?>
            <?= Yii::$app->session->getFlash('error'); ?>
            <h1>Welcome, <?= Html::encode($this->title) ?></h1>
            <h2>
            Name: <?=$model->firstname.' '.$model->lastname;?>
                <small>Job Title: <?= $model->jobtitle; ?></small>
                <?php


                ?>
            </h2>
        </header>
        <div class="card ">
            <div class="row">

                <div class="col-md-12">
                    <div class="profile__info">

                        <h3>Description</h3>
                        <p><?= $model->description ?></p>
                        <h3>User role</h3>
                        <p><?= $model->userrole ?></p>
                        <h3>Joined since</h3>
                        <p><?= $model->created_at ?></p>
                        <h3>Last Update</h3>
                        <p><?= $model->updated_at ?></p>
                        <h3>Contact email</h3>
                        <p><?= '<a href="mailto:'.$model->email.'">'.$model->email.'</a>' ?></p>

                        <p>
                            <?php
                            $userid=Yii::$app->user->identity->getId();
                            $userCurrent=User::findOne(['id'=>$userid]);

                            if ($userCurrent->userrole =='System Admin' || $model->id == $userid){
                            echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
                            }

                            ?>
                            <?php
                            if ( $userCurrent->userrole=='System Admin'){
                                echo Html::a('Delete', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]);


                            }

                            ?>


                        </p>
                    </div>


                </div>



            </div>


        </div>



    </div>
<!--    --><?//= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'firstname',
//            'lastname',
//            'jobtitle',
//            'username',
//            'description',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
//            'email:email',
//            'role',
//            'status',
//            'created_at',
//            'updated_at',
//        ],
//    ]) ?>

</div>
