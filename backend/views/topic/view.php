<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use dosamigos\ckeditor\CKEditor;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Topic */

$this->title = $model->subject;
$this->params['breadcrumbs'][] = ['label' => 'Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topic-view">
    <div class="content__wrapper">
        <div class="content__title"><h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->topicid], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->topicid], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
        <div class="card">
            <?= $model->question;?>
            <p><?= $model->creationdate;?> by <?= $model->getUserName();?></p></p>
        </div>




<!--        --><?//= DetailView::widget([
//            'model' => $model,
//            'attributes' => [
//                'topicid',
//                'subject',
//                'question:ntext',
//                'creationdate',
//                'userid',
//            ],
//        ]) ?>


        <div class="content__title"><h1><?= $model->getTotalReplies()  ?> Answer</h1></div>
        <?= ListView::widget([
            'dataProvider' => $listRepliesProvider,
            'options' => [
                'tag' => 'div',
                'class' => 'list-wrapper',
                'id' => 'list-wrapper',
            ],
            'layout' => "{pager}\n{items}\n{summary}",
            'itemView' => function ($model, $key, $index, $widget) {
                return '<div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <h4>'
                .$model ->content.'</h4>'
                .
                ' </h4></div>
                                    <div class="col-sm-10"><p>'
                . $model -> content.

                '</p><p>
                                    asked at: '. $model->creationdate.
                '</p></div>
                                   <div class="col-sm-2 text-center">

                                    <p>answers</p>
                                   </div>
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
        <div class="row">

            <div class="col-sm-12">
                <?= $this->render('/topic/create', [
                    'model' => $model])
                   ?>

                <!--                --><?// $form= ActiveForm::begin ([
//                    'id' => 'login-form',
//
//                ]) ?>
<!--                -->
<!--                <div class="form-group">-->
<!--                    --><?//= $form->field($model, 'question')->widget(CKEditor::className(), [
//                        'options' => ['rows' => 6],
//                        'preset' => 'basic'
//                    ]) ?>
<!---->
<!--                </div>-->
<!---->
<!---->
<!--                --><?php // ActiveForm::end()?>
            </div>



        </div>


    </div>




</div>
