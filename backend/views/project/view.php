<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use backend\models\User;
use backend\models\Activity;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $model backend\models\Project */

$this->title = $model->projectid;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">


    <div class="content">
        <div class="content-wrapper">

        <header class="content__header">
            <h1>Project: <?= $model->projectname ?></h1>

            <? $user = User::findOne(['id'=>$model->userid]);?>
            <h2>Project Owner: <?=$user->username ?> </h2>

        </header>


        <div class="card">
            <div class="row">

                <div class="col-md-12">

                        <div class="row">
                            <div class="col-sm-12">
                                <br/>
                                <p>
                                    <?= Html::a('Update', ['update', 'id' => $model->projectid], ['class' => 'btn btn-primary']) ?>
                                    <?= Html::a('Delete', ['delete', 'id' => $model->projectid], [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                </p>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Project Classification</h3>
                                <p><?= $model->projectclassification ?></p>


                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Project Desription</h3>
                                <p><?= $model->projectdescription ?></p>

                            </div>
                        </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Planned start Date</h3>
                            <p><?= $model->projectplannedstartdate ?></p>

                        </div>
                        <div class="col-sm-6">
                            <h3>Planned end Date</h3>
                            <p><?= $model->projectplannedenddate ?></p>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Actual start Date</h3>
                            <p><?= $model->projectactualstartdate ?></p>

                        </div>
                        <div class="col-sm-6">
                            <h3>Actual end Date</h3>
                            <p><?= $model->projectactualenddate ?></p>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Creation Date</h3>
                            <p><?= $model->creationdate ?></p>

                        </div>
                        <div class="col-sm-6">
                            <h3>Project status</h3>
                            <p><?= $model->projectstatus ?></p>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <a href="<?= Url::base(true).'/'.$model->projectfile ?>" <i class="zmdi zmdi-download"></i> Download (Right click and save)</a>


                    <P> <?= Url::base(true)?></P>
                        </div>

                    </div>



                </div>



            </div>


        </div>

            <div class="card">

                <div class="row">

<!--                    <div class="col-sm-12">-->
<!--                        <div class="panel-group" id="accordion">-->
<!--                            <div class="panel panel-collapse">-->
<!--                                <div class="panel-heading">-->
<!--                                    <h4 class="panel-title">-->
<!--                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-1">-->
<!--                                            Collapsible Group Item #1-->
<!--                                        </a>-->
<!--                                    </h4>-->
<!--                                </div>-->
<!--                                <div id="collapse-1" class="collapse in">-->
<!--                                    <div class="panel-body">sdfsdfdfsd</div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="panel panel-collapse">-->
<!--                                <div class="panel-heading">-->
<!--                                    <h4 class="panel-title">-->
<!--                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-2">-->
<!--                                            Collapsible Group Item #2-->
<!--                                        </a>-->
<!--                                    </h4>-->
<!--                                </div>-->
<!--                                <div id="collapse-2" class="collapse">-->
<!--                                    <div class="panel-body">sdfsdfds</div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="panel panel-collapse">-->
<!--                                <div class="panel-heading">-->
<!--                                    <h4 class="panel-title">-->
<!--                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-3">-->
<!--                                            Collapsible Group Item #3-->
<!--                                        </a>-->
<!--                                    </h4>-->
<!--                                </div>-->
<!--                                <div id="collapse-3" class="collapse">-->
<!--                                    <div class="panel-body">sdfsdfds</div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!---->
<!--                    </div>-->

                    <div class="col-sm-12">

                        <div class="panel-group" id="accordion">

                            <?php
                            $foundActivitys = Activity::findAll(['projectid' => $model->projectid]);
                            $x=1;
                            foreach ($foundActivitys as $foundActivity) {

                               // echo "addMarker({$model->lat_field}, {$model->lon_field});";
                                echo '<div class="panel panel-collapse">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-'.$x.'">'
                                                   .  $foundActivity->activityname .
                                                '</a>


                                            </h4>
                                        </div>
                                        <div id="collapse-'.$x.'" class="collapse in">
                                            <div class="panel-body">sdfsdfdfsd</div>
                                        </div>
                                    </div>';

                                    $x++;
                            }

                            ?>

                        </div>

                    </div>
                    <div class="col-sm-12">
<!--                        --><?// $ActivityRelated = Activity::findOne(['projectid'=>$model->projectid]);?>
                        <? $dataActivityProvider = new ActiveDataProvider([
                            'query' => Activity::find()->where(['projectid' => $model->projectid]),

                        ]);


                        echo GridView::widget([
                            'dataProvider' => $dataActivityProvider,
                            //  'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                //'taskid',
                                'projectid',
                                'activityname',
                                'activitydescription',
                                'activityplannedstartdate',
                                'activityplannedenddate',
                                'activityactualstartdate',
                                'activityactualenddate',
                                'creationdate',
                                'activitystatus',
                                'comments',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],

                        ]); ?>
                    </div>
                </div>



            </div>

        </div>
    </div>

</div>
