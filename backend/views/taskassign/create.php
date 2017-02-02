<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Taskassign */

$this->title = 'Create Taskassign';
$this->params['breadcrumbs'][] = ['label' => 'Taskassigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taskassign-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
