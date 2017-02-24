<?php
namespace frontend\models;

use yii\base\Model;

use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $firstname;
    public $lastname;
    public $jobtitle;
    public $userrole;
    public $username;
    public $email;
    public $password;
    public $created_at;


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
            ['jobtitle', 'required'],
           // ['userrole', 'required'],

            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            //['created_at','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->lastname = $this->lastname;
        $user->firstname = $this->firstname;
        $user->userrole="User";
        $user->jobtitle=$this->jobtitle;
        $user->email = $this->email;
        $user->generateAuthKey();
        $user->status=0;
        //$user->created_at=new CDbExpression('NOW()');

        $user->setPassword($this->password);
        $user->generateAuthKey();



        return $user->save() ? $user : null;
    }
}
