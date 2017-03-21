<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TopicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topic-index">
    <div class="content__wrapper">
        <div class="content__title">
            <div class="row">
                <div class="col-md-9">

                    <h1><?= Html::encode($this->title) ?></h1>

                </div>
                <div class="col-md-3 btn-search text-right">
                    <p>
                        <?= Html::a('Create Topic', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>


                </div>

            </div>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


        </div>
        <?php Pjax::begin(); ?>
        <?= ListView::widget([
            'dataProvider' => $listDataProvider,
            'options' => [
                'tag' => 'div',
                'class' => 'list-wrapper',
                'id' => 'list-wrapper',
            ],
            'layout' => "{pager}\n{items}\n{summary}",
            'itemView' => function ($model, $key, $index, $widget) {
                echo '<div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <h4>'
                                .Html::a('<h4>'.$model ->subject.'</h4>',['replies/index','key'=>$model->topicid])
                                    .
                                    ' </h4></div>
                                    <div class="col-sm-10">

                                    <p>
                                    asked at: '. $model->creationdate.
                                  '</p><p>
                                    asked by: '.$model->getUserName().
                                   ' </p></div>
                                   <div class="col-sm-2 text-center"><p>'
                                   .$model->getTotalReplies().
                                  ' </p>
                                    <p>answers</p>';
                $userid=Yii::$app->user->identity->getId();
                $usertest = User::findOne(['id'=>$userid]);
                if( $usertest->userrole == 'System Admin'){
                    echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->topicid], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]);
                    //echo  Html::a('<span class="glyphicon glyphicon-trash"></span>Delete',['project/delete','id'=>$model->topicid]);
                }


                                 echo  '</div>
                                    </div>
                                </div>
                            </div>
                        </div> ';
                // return $this->render('_list_item',['model' => $model]);

                // or just do some echo
                // return $model->title . ' posted by ' . $model->author;
            },
            'itemOptions' => [
                'tag' => false,
            ],
            'pager' => [
                'firstPageLabel' => 'first',
                'lastPageLabel' => 'last',
                'nextPageLabel' => 'next',
                'prevPageLabel' => 'previous',
                'maxButtonCount' => 3,
            ],
            //'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'topicid',
//            'subject',
//            'question:ntext',
//            'creationdate',
//            'userid',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],

        ]); ?>
        <?php Pjax::end(); ?>
    </div>




</div>
