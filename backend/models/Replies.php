<?php

namespace backend\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "replies".
 *
 * @property integer $replyid
 * @property string $content
 * @property string $creationdate
 * @property integer $topicid
 * @property integer $userid
 *
 * @property Topic $topic
 * @property User $user
 */
class Replies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'replies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
           // [['creationdate'], 'safe'],
            [['topicid', 'userid'], 'integer'],
            [['topicid'], 'exist', 'skipOnError' => true, 'targetClass' => Topic::className(), 'targetAttribute' => ['topicid' => 'topicid']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'replyid' => 'Replyid',
            'content' => 'Content',
            'creationdate' => 'Creationdate',
            'topicid' => 'Topicid',
            'userid' => 'Userid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopic()
    {
        return $this->hasOne(Topic::className(), ['topicid' => 'topicid']);
    }
    public function getTopicName($key)
    {
        $topicSubject=Topic::findOne(['topicid'=>$key]);
        return $topicSubject->subject;
    }

    public function getReplies($key)
    {
       return $this->findAll(['topicid'=>$key]);
       // return $this->hasMany(Replies::className(), ['topicid' => 'topicid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }

    public function getUserName() {
        $user=User::findOne(['id'=>$this->userid]);
        return $user->username; ;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {
                $this->creationdate = new Expression('NOW()');
                $this->userid=\Yii::$app->user->identity->getId();
               //$this->topicid=$key;
            } else {
                $this->userid=\Yii::$app->user->identity->getId();
                $this->creationdate = new Expression('NOW()');
               // $this->topicid=$key;
            }

            return true;
        } else {
            return false;
        }
    }

}
