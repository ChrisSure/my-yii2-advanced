<?php
namespace backend\logic\form\auth;

use Yii;
use yii\base\Model;



class UserPasswordForm extends Model
{
	
    public $password;
	

    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'max' => 255],
        ];
    }
    
    
    public function attributeLabels()
    {
        return [
            'password' => 'Пароль',
        ];
    }
    
    
}