<?php

namespace backend\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "task".
 *
 * @property integer $assignID
 * @property integer $userid
 * @property integer $activityid
 * @property string $taskname
 * @property string $taskdescription
 * @property string $taskplannedstartdate
 * @property string $taskplannedenddate
 * @property string $taskactualstartdate
 * @property string $taskactualenddate
 * @property string $creationdate
 * @property string $taskstatus
 * @property string $taskfile
 * @property string $comments
 *
 * @property Activity $activity
 * @property User $user
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $newfile;
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
            [['userid', 'activityid', 'taskname', 'taskplannedstartdate', 'taskplannedenddate', 'taskactualstartdate', 'taskactualenddate', 'taskstatus'], 'required'],
            [['userid', 'activityid'], 'integer'],
            [['taskplannedstartdate', 'taskplannedenddate', 'taskactualstartdate', 'taskactualenddate', 'creationdate'], 'safe'],
            [['taskstatus', 'comments'], 'string'],
            [['newfile'],'file'],
            [['taskname', 'taskdescription', 'taskfile'], 'string', 'max' => 255],
            [['activityid'], 'exist', 'skipOnError' => true, 'targetClass' => Activity::className(), 'targetAttribute' => ['activityid' => 'activityid']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'assignID' => 'Task ID',
            'userid' => 'User name',
            'activityid' => 'Activity Name',
            'taskname' => 'Task name',
            'taskdescription' => 'Task description',
            'taskplannedstartdate' => 'Task planned start date',
            'taskplannedenddate' => 'Task planned end date',
            'taskactualstartdate' => 'Task actualstartdate',
            'taskactualenddate' => 'Task actual end date',
            'creationdate' => 'Creation date',
            'taskstatus' => 'Task status',
            'taskfile' => 'Task file',
            'comments' => 'Comments',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activity::className(), ['activityid' => 'activityid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->creationdate = new Expression('NOW()');
            }
            return true;
        } else {
            return false;
        }
    }


}
