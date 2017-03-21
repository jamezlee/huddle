<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Replies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="replies-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
                            <?= $form->field($model, 'content')->widget(CKEditor::className(), [
                                'options' => ['rows' => 6],
                                'preset' => 'basic'
                            ])->label("") ?>

    </div>





<!--    --><?//= $form->field($model, 'topicid')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'userid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
