<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\widgets\Alert;
use yii\widgets\Pjax;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">
    <div class="card">
        <div class="card__header">

            <h1><?= Html::encode($this->title) ?></h1>
            <?= Alert::widget() ?>

            <?php Pjax::begin();?>
            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
            <p>
                <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

        </div>

        <div class="card__body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute'=>'activityid',
                        'value'=>'activity.activityname',

                    ],
                    'taskname',
                    'taskdescription',
                    //'taskplannedstartdate',
                    'taskplannedenddate',
                    //'taskactualstartdate',
                    //'taskactualenddate',
                    // 'creationdate',
                    'taskstatus',
//            [
//                'attribute'=>'userid',
//                'value'=>'user.username',
//
//            ],

                    [
                        'attribute'=>'userid',
                        //'sortable'=>true,
                        'format'=>'raw',
                        'value' => function ($data) {
                            // $userid=Yii::$app->user->identity->getId();
                            $usertest = User::findOne(['id'=>$data->userid]);
                            $usertest->username;
                            if($usertest){
                                return $usertest->username;
                            }

                        },

                    ],

                    // 'taskfile',
                    // 'comments:ntext',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

        </div>

    </div>


</div>
