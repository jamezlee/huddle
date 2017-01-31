<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "taskassign".
 *
 * @property integer $assignID
 * @property integer $userid
 * @property integer $taskid
 */
class Taskassign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taskassign';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'taskid'], 'required'],
            [['userid', 'taskid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'assignID' => 'Assign ID',
            'userid' => 'Userid',
            'taskid' => 'Taskid',
        ];
    }
}