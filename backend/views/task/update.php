<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Task */

$this->title = 'Update Task: ' . $model->taskname;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->assignID, 'url' => ['view', 'id' => $model->assignID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
