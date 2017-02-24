<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Project;
use dosamigos\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model backend\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="card__body">
        <div class="row">
          <?php $form = ActiveForm::begin(); ?>
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'projectid')->dropDownList(
                        ArrayHelper::map(Project::find()->all(), 'projectid', 'projectname'),
                        ['prompt'=>'Select Project to:']

                    ) ?>
                </div>
            </div>


            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'activityname')->textInput(['maxlength' => true]) ?>
                </div>
            </div>


            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'activitydescription')->widget(CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'basic'
                    ]) ?>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <div class="form-group">
                        <?= $form->field($model, 'activityplannedstartdate')->textInput(['class'=>'form-control date-picker']) ?>
                        <i class="form-group__bar"></i>
                    </div>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <div class="form-group">
                        <?= $form->field($model, 'activityplannedenddate')->textInput(['class'=>'form-control date-picker']) ?>
                        <i class="form-group__bar"></i>
                    </div>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <div class="form-group">
                        <?= $form->field($model, 'activityactualstartdate')->textInput(['class'=>'form-control date-picker']) ?>
                        <i class="form-group__bar"></i>
                    </div>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <div class="form-group">
                        <?= $form->field($model, 'activityactualenddate')->textInput(['class'=>'form-control date-picker']) ?>
                        <i class="form-group__bar"></i>
                    </div>

                </div>
            </div>


            <div class="col-sm-12">
                <div class="form-group">
                        <?= $form->field($model, 'activitystatus')->dropDownList([ 'Inprocess' => 'Inprocess', 'Completed' => 'Completed', 'Canceled' => 'Canceled', ], ['prompt' => '']) ?>

                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'comments')->textInput() ?>

                </div>
            </div>




            <!--        --><?//= $form->field($model, 'creationdate')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
        </div>
    </div>
