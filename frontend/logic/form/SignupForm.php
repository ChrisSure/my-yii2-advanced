<?php
namespace frontend\logic\form;

use yii\base\Model;
use common\entities\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $reCaptcha;


    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'unique', 'targetClass' => '\common\entities\User', 'message' => 'This username has already been taken.'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\entities\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 3],
            
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className()]
        ];
    }
    
    
    public function attributeLabels()
    {
        return [
        	'username' => 'Ім\'я',
        	'email' => 'E-mail',
            'password' => 'Пароль',
            'reCaptcha' => 'Будь ласка, підтвердьте, що ви не бот.',
        ];
    }


}
