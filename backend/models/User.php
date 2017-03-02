<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\base\Configurable;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $jobtitle
 * @property string $username
 * @property string $description
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $userrole
 * @property integer $status
 * @property integer $created_at
 * @property integer
 *
 * @property Project[] $projects
 * @property Task[] $tasks

 */
class User extends \yii\db\ActiveRecord
{
    public $repeatnewpass;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }


    public function behaviors()
    {
        return [
            TimestampBehavior::className(),

        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['firstname', 'required'],
            ['lastname', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['jobtitle','required'],
            ['description','string'],
            ['jobtitle','string','min' => 2,'max'=>50],
            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],
            ['repeatnewpass', 'string', 'min' => 6],
            ['repeatnewpass', 'compare', 'compareAttribute'=>'password_hash', 'skipOnEmpty' => false, 'message'=>"Passwords don't match"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'First name',
            'lastname' => 'Last name',
            'jobtitle' => 'Job title',
            'username' => 'Username',
            'description' => 'Description',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'repeatnewpass'=>'Repeat New Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'userrole' => 'Role',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getProjects()
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
        return $this->hasMany(Project::className(), ['userid' => 'id']);
    }

    public function getTasks()
    {
        return $this->auth_key;
        return $this->hasMany(Task::className(), ['userid' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }


    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    public function getPassword($password)
    {
        return Yii::$app->getSecurity()->decryptByPassword($password,$this->password_hash);
    }
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @param before saving the data it will hash the password and insert the time or update time if updated
     * @return hash password and date and time
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {
                $this->created_at = new Expression('NOW()');
                $this->setPassword($this->password_hash);
                $this->status=0;
            }else{
                if($this->repeatnewpass==$this->password_hash){
                    $this->setPassword($this->repeatnewpass);
                }
                $this->updated_at = new Expression('NOW()');
            }

            return true;
        } else {
            return false;
        }
    }




    

}
