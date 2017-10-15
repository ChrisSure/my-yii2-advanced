<?php
namespace backend\logic\form;

use Yii;
use yii\base\Model;
use common\entities\User;



class UserForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;
    public $role;
    
    public $_user;
	

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            ['email', 'email'],
            [['status', 'role'], 'safe'],
            [['username', 'password'], 'string', 'max' => 255],
            [['username', 'email'], 'unique', 'targetClass' => User::class, 'filter' => $this->_user ? ['<>', 'id', $this->_user->id] : null]
        ];
    }
    
    
    public function attributeLabels()
    {
        return [
        	'email' => 'E-mail',
            'username' => 'Ім\'я',
            'role' => 'Роль',
            'password' => 'Пароль',
            'status' => 'Активувати',
        ];
    }
    
    
}
