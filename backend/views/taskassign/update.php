<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Taskassign */

$this->title = 'Update Taskassign: ' . $model->assignID;
$this->params['breadcrumbs'][] = ['label' => 'Taskassigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->assignID, 'url' => ['view', 'id' => $model->assignID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="taskassign-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
