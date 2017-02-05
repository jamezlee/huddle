<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "project".
 *
 * @property integer $projectid
 * @property string $projectname
 * @property string $projectclassification
 * @property string $projectdescription
 * @property string $projectplanedstartdate
 * @property string $projectplanedenddate
 * @property string $projectactualstartdate
 * @property string $projectactualenddate
 * @property string $createdate
 * @property integer $userid
 * @property string $projectstatus
 *
 * @property Task[] $tasks
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectname', 'projectclassification', 'projectdescription', 'projectplanedstartdate', 'projectplanedenddate', 'projectactualstartdate', 'projectactualenddate', 'userid', 'projectstatus'], 'required'],
            [['projectplanedstartdate', 'projectplanedenddate', 'projectactualstartdate', 'projectactualenddate', 'createdate'], 'safe'],
            [['userid'], 'integer'],
            [['projectstatus'], 'string'],
            [['projectname', 'projectclassification'], 'string', 'max' => 100],
            [['projectdescription'], 'string', 'max' => 255],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'projectid' => 'Project id',
            'projectname' => 'Project name',
            'projectclassification' => 'Project classification',
            'projectdescription' => 'Project description',
            'projectplanedstartdate' => 'Project planed start date',
            'projectplanedenddate' => 'Project planed end date',
            'projectactualstartdate' => 'Project actual start date',
            'projectactualenddate' => 'Project actual end date',
            'createdate' => 'Create date',
            'userid' => 'Project Owner',
            'projectstatus' => 'Project status',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['projectid' => 'projectid']);
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->createdate = new Expression('NOW()');
            }
            return true;
        } else {
            return false;
        }
    }



}
