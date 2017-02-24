<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Users';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <header class="content__header">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </header>


     <!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="card">
    <div class="card__body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                'firstname',
                'lastname',
                'jobtitle',
                'username',
                // 'description',
                // 'auth_key',
                // 'password_hash',
                // 'password_reset_token',
                'email:email',
                 'userrole',
                // 'status',
                // 'created_at',
                // 'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>

    </div>

</div>
