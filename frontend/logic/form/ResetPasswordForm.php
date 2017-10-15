<?php
namespace frontend\logic\form;

use yii\base\Model;
use yii\base\InvalidParamException;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
	public $password;
	
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 3],
        ];
    }
	
	
	public function attributeLabels()
    {
        return [
            'password' => 'Пароль',
        ];
    }
    
}
