<?php

namespace backend\models;

use Yii;

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
            [['projectname', 'projectclassification', 'projectdescription', 'projectplanedstartdate', 'projectplanedenddate', 'projectactualstartdate', 'projectactualenddate', 'createdate', 'userid', 'projectstatus'], 'required'],
            [['projectplanedstartdate', 'projectplanedenddate', 'projectactualstartdate', 'projectactualenddate', 'createdate'], 'safe'],
            [['userid'], 'integer'],
            [['projectstatus'], 'string'],
            [['projectname', 'projectclassification'], 'string', 'max' => 100],
            [['projectdescription'], 'string', 'max' => 255],
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
            'projectplanedenddate' => 'Projectplanedenddate',
            'projectactualstartdate' => 'Projectactualstartdate',
            'projectactualenddate' => 'Projectactualenddate',
            'createdate' => 'Createdate',
            'userid' => 'Userid',
            'projectstatus' => 'Projectstatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['projectid' => 'projectid']);
    }
}
