<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Replies */

$this->title = 'List of Replies';
$this->params['breadcrumbs'][] = ['label' => 'Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="replies-create">

    <h1>Please reply here</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
