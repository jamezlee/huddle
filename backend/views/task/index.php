<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\widgets\Alert;
use yii\widgets\Pjax;
use backend\models\User;
use backend\models\Task;
use backend\models\Project;
use backend\models\Activity;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use \yii\db\Query;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="task-index">
    <div class="card">
        <?php Pjax::begin();?>
        <div class="card__header">

            <h1><?= Html::encode($this->title) ?></h1>
            <?= Alert::widget() ?>


            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
            <p>

                <?
                $userid=Yii::$app->user->identity->getId();
                $userCurrent=User::findOne(['id'=>$userid]);

                if($userCurrent->userrole!="User"){
                    echo Html::a('Create Task', ['create'], ['class' => 'btn btn-success']);

                }
                 ?>
            </p>

        </div>



        <div class="card__body">

            <?
//            $userID=Yii::$app->user->identity->getId();
//            $currentUser=User::findOne(['id'=>$userID]);
//
//            $currentProjects=Project::find()->where(['userid'=>$userID]);





                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        [
                            'attribute' => 'activityid',
                            'value' => 'activity.activityname',

                        ],
                        'taskname',
                        'taskdescription',
                        'taskplannedenddate',
                        'taskstatus',


                        [
                            'attribute' => 'userid',
                            //'sortable'=>true,
                            'format' => 'raw',
                            'value' => function ($data) {
                                // $userid=Yii::$app->user->identity->getId();
                                $usertest = User::findOne(['id' => $data->userid]);
                                $usertest->username;
                                if ($usertest) {
                                    return $usertest->username;
                                }

                            },

                        ],

                        // 'taskfile',
                        // 'comments:ntext',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);







            ?>

        </div>
        <?php Pjax::end();?>

    </div>


</div>
