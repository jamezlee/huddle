<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "topic".
 *
 * @property integer $topicid
 * @property string $subject
 * @property string $question
 * @property string $creationdate
 * @property integer $userid
 *
 * @property Replies[] $replies
 * @property User $user
 */
class Topic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'topic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'question'], 'required'],
            [['question'], 'string'],
            [['creationdate'], 'safe'],
            [['userid'], 'integer'],
            [['subject'], 'string', 'max' => 255],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'topicid' => 'Topicid',
            'subject' => 'Subject',
            'question' => 'Question',
            'creationdate' => 'Creationdate',
            'userid' => 'Userid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Replies::className(), ['topicid' => 'topicid']);
    }

    public function getTotalReplies()
    {
        return $this->getReplies()->count();
    }
    public function getUserName() {
        $user=User::findOne(['id'=>$this->userid]);
        return $user->username; ;
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
                $this->userid=\Yii::$app->user->identity->getId();
            } else {
                $this->userid=\Yii::$app->user->identity->getId();
                $this->creationdate = new Expression('NOW()');
            }

            return true;
        } else {
            return false;
        }
    }

}
