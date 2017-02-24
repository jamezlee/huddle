<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "activity".
 *
 * @property integer $activityid
 * @property integer $projectid
 * @property string $activityname
 * @property string $activitydescription
 * @property string $activityplannedstartdate
 * @property string $activityplannedenddate
 * @property string $activityactualstartdate
 * @property string $activityactualenddate
 * @property string $creationdate
 * @property string $activitystatus
 * @property integer $comments
 *
 * @property Project $project
 * @property Task[] $tasks
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'activityname', 'activityplannedstartdate', 'activityplannedenddate', 'activityactualstartdate', 'activityactualenddate', 'activitystatus'], 'required'],
            [['projectid'], 'integer'],
            [['activityplannedstartdate', 'activityplannedenddate', 'activityactualstartdate', 'activityactualenddate', 'creationdate'], 'safe'],
            [['activitystatus', 'comments'], 'string'],
            [['activityname', 'activitydescription'], 'string', 'max' => 255],
            [['projectid'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['projectid' => 'projectid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'activityid' => 'Activity name:',
            'projectid' => 'Project name:',
            'activityname' => 'Give the name for your activity:',
            'activitydescription' => 'Activity description',
            'activityplannedstartdate' => 'Activity planned start date',
            'activityplannedenddate' => 'Activity planned end date',
            'activityactualstartdate' => 'Activity actual start date',
            'activityactualenddate' => 'Activity actual end date',
            'creationdate' => 'Creation date',
            'activitystatus' => 'Activity status',
            'comments' => 'Comments',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['projectid' => 'projectid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['activityid' => 'activityid']);
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
