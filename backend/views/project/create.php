<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Project */

;
?>
<div class="project-create">
    <div class="card">

        <header class="content__header">
        <?php $this->title = 'Create New Project';
        $this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
        $this->params['breadcrumbs'][] = $this->title;?><br/>
        <h1><?= Html::encode($this->title) ?></h1>
        </header>


        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
