<?php
namespace backend\logic\form\auth;

use Yii;
use yii\base\Model;
use common\logic\entities\auth\User;

/**
 * Admin Login form
 */
class AdminLoginForm extends Model
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
