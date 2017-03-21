<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Activity */

$this->title = 'Update Activity: ' . $model->activityname;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->activityid, 'url' => ['view', 'id' => $model->activityid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
