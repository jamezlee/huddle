<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Replies */

$this->title = 'Update Replies: ' . $model->replyid;
$this->params['breadcrumbs'][] = ['label' => 'Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->replyid, 'url' => ['view', 'id' => $model->replyid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="replies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
