<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use common\widgets\Alert;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Users';
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-index">
    <script>
        $.pjax.reload({container:'#w1'});
    </script>

    <header class="content__header">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= Alert::widget() ?>
        <?= Yii::$app->session->getFlash('error'); ?>
        <p>
            <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </header>


     <!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <?php

    // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="card">
    <div class="card__body">
        <?php \yii\widgets\Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'class'=>'test',
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

                ['class' => 'yii\grid\ActionColumn',
                    'header'=>'Actions',
                    'template' => '{view} {update} {delete} ',
                    'visibleButtons'=>[
//                                'view' => [
//                                    $usertest->userrole == 'System Admin' ,
//                                    ],
                        'view' => function ($data) {
                            $userid=Yii::$app->user->identity->getId();
                            $usertest = User::findOne(['id'=>$userid]);
                            if($usertest->userrole == 'Project Owner' || $usertest->userrole == 'System Admin'){
                                return Html::a('<span class="fa fa-search"></span>View',['user/view','id'=>$data->id]);
                            }

                        },
                        'update' => function ($data) {
                            $userid=Yii::$app->user->identity->getId();
                            $usertest = User::findOne(['id'=>$userid]);
                            if( $usertest->userrole == 'System Admin' || $usertest->id == $data->id){
                                return Html::a('<span class="fa fa-search"></span>View',['user/update','id'=>$data->id]);
                            }

                        },
                        'delete' => function ($data) {
                            $userid=Yii::$app->user->identity->getId();
                            $usertest = User::findOne(['id'=>$userid]);
                            if( $usertest->userrole == 'System Admin'){
                                return Html::a('<span class="fa fa-search"></span>View',['user/delete','id'=>$data->id]);
                            }

                        },



                    ],

                ],
            ],
        ]); ?>

        <?php \yii\widgets\Pjax::end(); ?>


    </div>

    </div>

</div>
