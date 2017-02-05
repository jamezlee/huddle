<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">
    <div class="card">
            <div class="card__header">
                <h1><?= Html::encode($this->title) ?></h1>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <p>
                    <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="card__body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'projectid',
                        'projectname',
                        // 'projectclassification',
                        'projectdescription:html',
                        'projectplanedstartdate',
                        'projectplanedenddate',
                        'projectactualstartdate',
                        'projectactualenddate',
                        // 'createdate',
                        // 'userid',
                        'projectstatus',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

            </div>
    </div>



</div>
