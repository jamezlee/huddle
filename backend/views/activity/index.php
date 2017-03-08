<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\widgets\Alert;
use yii\widgets\Pjax;
use backend\models\Activity;
use backend\models\User;

use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">
    <div class="card">
        <div class="card__header">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <?php Pjax::begin();?>
            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

        </div>
        <div class="card__body">
            <?
            $userID=Yii::$app->user->identity->getId();
            $currentUser=User::findOne(['id'=>$userID]);
//            if($currentUser->userrole=="Project Owner"){
//                $dataProvider = new ActiveDataProvider([
//                    'query' => Activity::find()->joinWith(['project'])->where(['userid' =>  $userID]),
//
//
//                ]);
//
//            }

            echo GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute'=>'projectid',
                        'value'=>'project.projectname',

                    ],



                    [
                        'attribute'=>'activityname',
                        'format'=>'raw',
                        'value' => function ($data) {
                            //$userid=Yii::$app->user->identity->getId();
                            //$usertest = User::findOne(['id'=>$userid]);
                            //if($usertest->userrole == 'Project Owner'||$usertest->userrole == 'System Admin' ){
                            return Html::a($data->activityname,['activity/view','id'=>$data->activityid]);
//                    }
//                    else{
//                        return $data->projectname;
//                    }
                        },
                    ],
                    'activitydescription',
                    'activityplannedstartdate',
                    // 'activityplannedenddate',
                    // 'activityactualstartdate',
                    // 'activityactualenddate',
                    // 'creationdate',
                    // 'activitystatus',
                    // 'comments',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>


        </div>

    </div>


    <?php Pjax::end();?>
</div>
