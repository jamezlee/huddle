<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Activity */

$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-create">
    <div class="card">
        <header class="content__header">
            <?php $this->title = 'Create Activity'; ?>
            <br/>
             <h1><?= Html::encode($this->title) ?></h1>
        </header>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
