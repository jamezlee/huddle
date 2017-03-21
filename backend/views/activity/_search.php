<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ActivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group">
                <div class="top-search">
                    <?= $form->field($model, 'globalActivitySearch')->label("")->textInput(['class'=>'top-search__input','placeholder'=>'search for activity']) ?>
                    <i class="zmdi zmdi-search top-search__reset"></i>
                </div>

            </div>

        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <div class="btn-search">
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>

                </div>

            </div>
        </div>

    </div>


    <?php ActiveForm::end(); ?>

</div>
