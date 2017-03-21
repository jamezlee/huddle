<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ListView;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RepliesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Replies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="replies-index">
    <div class="content__wrapper">

        <?php Pjax::begin(); ?>
        <?= ListView::widget([
            'dataProvider' => $listTopicProvider,
            'options' => [
                'tag' => 'div',
                'class' => 'list-wrapper',
                'id' => 'list-wrapper',
            ],
            'summary'=>'',
           // 'layout' => "{pager}\n{items}\n{summary}",
            'itemView' => function ($model, $key, $index, $widget) {
                echo ' <div class="content__title"><h1>Topic: '.$model ->subject .'</h1></div>
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <p>'
                                    .$model ->question.'</p>
                                    </div>
                                    <div class="col-sm-10">';

                                  echo ' <p>
                                    asked at: '. $model->creationdate.
                '</p><p>
                                    asked by: '.$model->getUserName().
                ' </p></div>



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


        ]); ?>


    </div>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!---->
<!--        --><?//= Html::a('Create Replies', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->




    <h1>Answers </h1>

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

                                    <div class="col-sm-10"><p>'
            . $model -> content.

            '</p><p>
                                    Reply at: '. $model->creationdate.
            '</p></div>
                                   <div class="col-sm-2 text-center">

                                    <p>answers by</p><p>' .$model -> getUserName() . '</p>
                                    <p>';
            $userid=Yii::$app->user->identity->getId();
            $usertest = User::findOne(['id'=>$userid]);
            if( $usertest->userrole == 'System Admin'){
                echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->replyid], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]);
                //echo  Html::a('<span class="glyphicon glyphicon-trash"></span> Delete',['replies/delete','id'=>$model->replyid]);
            }
            echo'</p>
                                   </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
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

    ]); ?>


    <div class="row">

        <div class="col-sm-12">
            <?= $this->render('/replies/create', [
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

        <?php Pjax::end(); ?>

    </div>

</div>
