<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;

use backend\models\Project;
use backend\models\Task;
use backend\models\Activity;
use backend\models\User;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

$this->title = 'Huddle';

$userID=Yii::$app->user->identity->getId();
$currentUser=User::findOne(['id'=>$userID]);
$userProject=Project::findAll(['userid'=>$userID]);

if ( $currentUser->userrole=="Project Owner") {

    $query1s = Activity::find()->from(['project', 'activity'])->where('project.projectid=activity.projectid')->andWhere(['project.userid' => $userID])->all();
    foreach ($query1s as $query1) {
        $dataarrays[] = $query1->activityid;

    }

}



?>
<div class="content__wrapper">
    <div class="content__title">
        <h1>Dashboard</h1>
    </div>

    <div class="row">
        <?php
        if ( $currentUser->userrole=="Project Owner") {

        echo '<div class="col-md-4 text-center">
            <div class="card">';
                $time = new DateTime('now');
                $today=$time->format('Y-m-d');

                    $overdueProject = Project::find()->where(['COUNT(*)'])->where(['userid' => $userID])->andWhere(['>=', 'projectactualenddate', $today])->andWhere(['projectstatus' => 'Inprocess'])->all();
                    echo '<h3> Project Overdue</h3>
                        <h2>'

                        . count($overdueProject) . '</h2>';



            echo '</div>

        </div>';
        }
?>



        <?php
        if ( $currentUser->userrole=="Project Owner") {
       echo' <div class="col-md-4 text-center">
            <div class="card">';

                $inproProject = Project::findAll(['projectstatus'=>'Inprocess','userid'=>$userID]);
                echo'<h3> Open Project</h3>
                        <h2>'
                    .count($inproProject) .'</h2>';


        echo' </div>

        </div>
        <div class="col-md-4 text-center">
            <div class="card">';

                $completeProject = Project::findAll(['projectstatus'=>'Completed','userid'=>$userID]);
                echo'<h3> Closed Project </h3>
                        <h2>'
                    .count($completeProject) . '</h2>';


           echo'</div>

        </div>
    </div>';
        }
?>
    <?php
    if ( $currentUser->userrole=="Project Owner") {

    echo '<div class="card">
        <div class="card__body">
            <div class="row">
                <div class="col-md-3">
                    <h3>Project Overdue</h3>
                </div>
                <div class="col-md-12">';

                    $time = new DateTime('now');
                    $future = new DateTime('now');
                    $future->modify('+1 day');
                    $futuretime = $future->format('Y-m-d');
//                    $today=$time->format('Y-m-d');
//
//                    echo $futuretime;
//                    echo $today;
//                    echo $userID;
                    $dataProvider = new ActiveDataProvider([
                        'query' => Project::find()->where(['userid'=>$userID])->andWhere(['>=','projectactualenddate',$today])->orderBy('projectactualenddate ASC')->limit(5),
                        'pagination'=>false,
                        'sort'=>false,



                    ]);


                   echo GridView::widget([

                        'dataProvider' => $dataProvider,
                        'emptyText' => '',
                        'rowOptions'=>function($model,$index,$widget,$grid){
                            $time = new DateTime('now');
                            $future = new DateTime('now');
                            $future->modify('+5 day');
                            $today=$time->format('Y-m-d');
                            $diff=strtotime($model->projectactualenddate)-strtotime($today);
                            $days = floor($diff / (60*60*24) );
                          //  echo $days .'<br>';
                                if($days <= 5 && $days > 0 ){
                                    return ['class'=>'warning' ];
                                }else if($diff <= 0){
                                    return ['class'=>'danger'];
                                }

                        },
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute'=>'projectname',
                                'format'=>'raw',
                                //'value'=>'taskname',
                                'value' => function ($data) {
                                    //$uid=$data->userid;
                                    //$usertest = User::findOne(['id'=>$data->userid]);
                                    // if($usertest->userrole == 'Project Owner'||$usertest->userrole == 'System Admin' ){
                                    return Html::a($data->projectname,['project/view','id'=>$data->projectid],['class'=>'black']);

                                },

                            ],
                            'projectactualstartdate',
                            'projectactualenddate',
                            'projectstatus',
                            [
                                'attribute'=>'userid',
                                'value'=>'user.username'

                            ],

                        ],
                        'summary'=>'',
                    ]);

        echo '<div class="col-md-12 text-right">
                <P>'
                    . html::a('View all',['project/index'],['class'=>'btn btn-info']).
                '</P></div>';

    echo '</div>
            </div>




        </div>




    </div>';}
    ?>
    <?
    if ( $currentUser->userrole=="Project Owner") {
    echo '<div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3>Task Related to Member</h3>';
                $query2s =Task::find()->where(['activityid'=>$dataarrays]);
                $dataTaskProvider =new ActiveDataProvider([
                    'query'  => $query2s,
                    'pagination'=>false,
                        'sort'=>false,
                ]);

                echo GridView::widget([
                    'dataProvider' => $dataTaskProvider,
                    //  'filterModel' => $searchModel,
                    'rowOptions'=>function($model,$index,$widget,$grid){
                        $time = new DateTime('now');
                        $future = new DateTime('now');
                        $future->modify('+5 day');
                        $today=$time->format('Y-m-d');
                        $diff=strtotime($model->taskactualenddate)-strtotime($today);
                        $days = floor($diff / (60*60*24) );
                        //  echo $days .'<br>';
                        if($days <= 5 && $days > 0 ){
                            return ['class'=>'warning' ];
                        }else if($diff <= 0){
                            return ['class'=>'danger'];
                        }

                    },
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute'=>'task name',
                            'format'=>'raw',
                            //'value'=>'taskname',
                            'value' => function ($data) {
                                //$uid=$data->userid;
                                //$usertest = User::findOne(['id'=>$data->userid]);
                                // if($usertest->userrole == 'Project Owner'||$usertest->userrole == 'System Admin' ){
                                return Html::a($data->taskname,['task/view','id'=>$data->assignID]);

                            },
                        ],
                        [
                            'attribute'=>'userid',
                           // 'value'=>'user.username',
                            'format'=>'raw',
                            'value' => function ($data) {
                                //$uid=$data->userid;
                                $usertest = User::findOne(['id'=>$data->userid]);
                               // if($usertest->userrole == 'Project Owner'||$usertest->userrole == 'System Admin' ){
                                    return Html::a($usertest->username,['user/view','id'=>$data->userid]);

                            },

                        ],
                        //'taskid',
                        'taskactualenddate',
                        'taskdescription:html',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                    'summary'=>'Task',
                ]);

    echo '</div>
        </div>




     </div>' ;}

?>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <h2>Task Assign to <? echo $currentUser->username; ?></h2>

                <?
                $dataTaskProvider = new ActiveDataProvider([
                    'query' => Task::find()->where(['userid' =>  $userID])->orderBy('taskactualenddate ASC')->limit(5),
                    'pagination'=>false,
                    'sort'=>false,
                ]);
                echo GridView::widget([
                    'dataProvider' => $dataTaskProvider,
                    //  'filterModel' => $searchModel,
                    'rowOptions'=>function($model,$index,$widget,$grid){
                            $time = new DateTime('now');
                            $future = new DateTime('now');
                            $future->modify('+5 day');
                            $today=$time->format('Y-m-d');
                            $diff=strtotime($model->taskactualenddate)-strtotime($today);
                            $days = floor($diff / (60*60*24) );
                          //  echo $days .'<br>';
                                if($days <= 5 && $days > 0 ){
                                    return ['class'=>'warning' ];
                                }else if($diff <= 0){
                                    return ['class'=>'danger'];
                                }

                        },
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute'=>'activityid',
                            'value'=>'activity.activityname',

                        ],
                        [
                            'attribute'=>'userid',
                            'value'=>'user.username',

                        ],
                        'taskactualenddate',
                        //'taskid',
                        'taskdescription:html',

                       // ['class' => 'yii\grid\ActionColumn'],
                    ],
                    'summary'=>'Task',
                ]); ?>

            </div>
        </div>

    </div>


</div>
