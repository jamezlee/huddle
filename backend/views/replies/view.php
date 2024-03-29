<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Replies */

$this->title = $model->replyid;
$this->params['breadcrumbs'][] = ['label' => 'Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="replies-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <h2><?= $model->topicid?></h2>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->replyid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->replyid], [
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
            'replyid',
            'content:ntext',
            'creationdate',
            'topicid',
            'userid',
        ],
    ]) ?>

</div>
