<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;
use backend\models\Activity;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">
    <div class="card__body">
        <div class="card">
        <div class="row">

            <?php $form = ActiveForm::begin(); ?>
            <div class="col-sm-12">
                <div class="form-group">
                    <?
                    $userid=Yii::$app->user->identity->getId();
                    $userCurrent=User::findOne(['id'=>$userid]);

                    if($userCurrent->userrole=="System Admin" || $userCurrent->userrole=="Project Owner") {
                        echo $form->field($model, 'activityid')->dropDownList(
                            ArrayHelper::map(Activity::find()->all(), 'activityid', 'activityname'),
                            ['prompt' => 'Select Activity']

                        );
                    }else{
                       $currentActivity= Activity::findOne(['activityid'=>$model->activityid]);
                        echo'<h5>Activity related:</h5>' .$currentActivity->activityname;

                    }


                    ?>
                </div>
            </div>


            <div class="col-sm-12">
                <div class="form-group">
                    <?

                    if($userCurrent->userrole=="System Admin" || $userCurrent->userrole=="Project Owner"){

                    echo $form->field($model, 'userid')->dropDownList(
                        ArrayHelper::map(User::find()->all(), 'id', 'username'),
                        ['prompt'=>'Select Owner']

                    )->label("Task Owner:") ;

                    }else{
                        $userOwner=User::findOne(['id'=>$model->userid]);
                        echo "Task Owner: ". $userOwner->username;
                    }

                    ?>

                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">

                    <?
                    if($userCurrent->userrole=="System Admin" || $userCurrent->userrole=="Project Owner") {
                        echo $form->field($model, 'taskname')->textInput(['maxlength' => true]);
                    }else{
                        echo'<h5>Task name</h5>'.$model->taskname ;
                    }
                    ?>



                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <?
                    if($userCurrent->userrole=="System Admin" || $userCurrent->userrole=="Project Owner") {
                        echo $form->field($model, 'taskdescription')->widget(CKEditor::className(), [
                            'options' => ['rows' => 6],
                            'preset' => 'basic'
                        ]);
                    }else{
                        echo'<h5>Task description</h5>'.$model->taskdescription ;
                    }
                    ?>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <div class="form-group">
                        <?= $form->field($model, 'taskplannedstartdate')->textInput(['class'=>'form-control date-picker']) ?>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <div class="form-group">
                        <?= $form->field($model, 'taskplannedenddate')->textInput(['class'=>'form-control date-picker']) ?>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <div class="form-group">
                        <?= $form->field($model, 'taskactualstartdate')->textInput(['class'=>'form-control date-picker']) ?>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <div class="form-group">
                        <?= $form->field($model, 'taskactualenddate')->textInput(['class'=>'form-control date-picker']) ?>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>


            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'taskstatus')->dropDownList([ 'Inprocess' => 'Inprocess', 'Completed' => 'Completed', 'Canceled' => 'Canceled', ], ['prompt' => '']) ?>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'comments')->widget(CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'basic'
                    ]) ?>

                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <?php if($model->taskfile!=null){
                        echo '<p>'. $model->taskfile. '</p>';
                    } ?>
                    <?= $form->field($model, 'newfile')->fileInput()->label("Upload file"); ?>
                </div>
            </div>


            <div class="col-sm-12">
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
</div>
        </div>
    </div>


</div>
