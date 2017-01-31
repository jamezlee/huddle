<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Taskassign */

$this->title = $model->assignID;
$this->params['breadcrumbs'][] = ['label' => 'Taskassigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taskassign-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->assignID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->assignID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'assignID',
            'userid',
            'taskid',
        ],
    ]) ?>

</div>
