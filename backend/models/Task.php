<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $taskid
 * @property integer $projectid
 * @property string $taskname
 * @property string $taskdescription
 * @property string $taskplanedstartdate
 * @property string $taskplanedenddate
 * @property string $taskactualstartdate
 * @property string $taskactualenddate
 * @property string $taskstatus
 *
 * @property Project $project
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectid', 'taskname', 'taskdescription', 'taskplanedstartdate', 'taskplanedenddate', 'taskactualstartdate', 'taskactualenddate', 'taskstatus'], 'required'],
            [['projectid'], 'integer'],
            [['taskplanedstartdate', 'taskplanedenddate', 'taskactualstartdate', 'taskactualenddate'], 'safe'],
            [['taskstatus'], 'string'],
            [['taskname', 'taskdescription'], 'string', 'max' => 255],
            [['projectid'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['projectid' => 'projectid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'taskid' => 'Taskid',
            'projectid' => 'Projectid',
            'taskname' => 'Taskname',
            'taskdescription' => 'Taskdescription',
            'taskplanedstartdate' => 'Taskplanedstartdate',
            'taskplanedenddate' => 'Taskplanedenddate',
            'taskactualstartdate' => 'Taskactualstartdate',
            'taskactualenddate' => 'Taskactualenddate',
            'taskstatus' => 'Taskstatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['projectid' => 'projectid']);
    }
}
