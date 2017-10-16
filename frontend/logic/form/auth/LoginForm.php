<?php
namespace frontend\logic\form\auth;

use Yii;
use yii\base\Model;
use common\entities\User;
use common\services\LoginServices;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;


    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['rememberMe', 'boolean'],
        ];
    }
    
    
    public function attributeLabels()
    {
        return [
        	'email' => 'E-mail',
            'password' => 'Пароль',
            'rememberMe' => 'Запам\'ятати мене',
        ];
    }
    
}
