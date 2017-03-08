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
 * @property string $projectplannedenddate
 * @property string $projectactualstartdate
 * @property string $projectactualenddate
 * @property string $creationdate
 * @property integer $userid
 * @property string $projectstatus
 * @property string $projectfile
 * @property string $comments
 * @property Activity $activity
 * @property User $user
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $newfile;

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
            [[ 'projectname', 'projectclassification', 'projectplannedstartdate', 'projectplannedenddate', 'projectactualstartdate', 'projectactualenddate', 'userid', 'projectstatus'], 'required'],
            [['projectplannedstartdate', 'projectplannedenddate', 'projectactualstartdate', 'projectactualenddate', 'creationdate','projectfile','newfile'], 'safe'],
            [['newfile'],'file'],
            [['userid'], 'integer'],
            [['projectstatus', 'comments'], 'string'],
            [['projectname', 'projectclassification'], 'string', 'max' => 100],
            [['projectdescription', 'projectfile'], 'string', 'max' => 255],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'projectid' => 'Projectid',
            'projectname' => 'Project Name',
            'projectclassification' => 'Project classification',
            'projectdescription' => 'Project Description',
            'projectplannedstartdate' => 'Planned Start Date',
            'projectplannedenddate' => 'Planned End Date',
            'projectactualstartdate' => 'Actual Start Date',
            'projectactualenddate' => 'Actual End Date',
            'creationdate' => 'Creation date',
            'userid' => 'Owner',
            'projectstatus' => 'Project Status',
            'projectfile' => 'Project file',
            'comments' => 'Comments',
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
    public function getActivity()
    {
        return $this->hasOne(Activity::className(), ['projectid' => 'projectid']);
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
