<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Task */

$this->title = 'Update Task: ' . $model->taskid;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->taskid, 'url' => ['view', 'id' => $model->taskid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
