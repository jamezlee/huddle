<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use backend\models\User;
use \yii\helpers\FileHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Project */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="project-form">

    <div class="card__body">
        <div class="row">

            <?php $form = ActiveForm::begin(); ?>
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'projectname')->textInput(['maxlength' => true,'class'=>'form-control']) ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'projectclassification')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'projectdescription')->widget(CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'basic'
                    ]) ?>

                </div>
            </div>


            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <div class="form-group">
                        <?= $form->field($model, 'projectplannedstartdate')->textInput(['class'=>'form-control date-picker']) ?>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <div class="form-group">
                        <?= $form->field($model, 'projectplannedenddate')->textInput(['class'=>'form-control date-picker']) ?>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <div class="form-group">
                        <?= $form->field($model, 'projectactualstartdate')->textInput(['class'=>'form-control date-picker']) ?>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>


            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <div class="form-group">
                        <?= $form->field($model, 'projectactualenddate')->textInput(['class'=>'form-control date-picker']) ?>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>




            <?php
            $user = User::findOne(['id'=>Yii::$app->user->identity->getId()]);
            if ($user->userrole=="System Admin"){
                echo'<div class="col-sm-12">
                <div class="form-group">'
                    . $form->field($model, 'userid')->dropDownList(
                        ArrayHelper::map(User::find()->all(), 'id', 'username'),
                        ['prompt'=>'Select Owner']

                    ).
                    ' </div>
            </div>';


            }

            ?>


            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'projectstatus')->dropDownList([ 'Inprocess' => 'Inprocess', 'Completed' => 'Completed', 'Canceled' => 'Canceled', ], ['prompt' => '']) ?>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <?php if($model->projectfile!=null){
                        echo '<p>'. $model->projectfile. '</p>';
                    } ?>
                    <?= $form->field($model, 'newfile')->fileInput()->label("Upload file"); ?>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>


<!--            --><?//= $form->field($model, 'createdate')->textInput() ?>





            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
