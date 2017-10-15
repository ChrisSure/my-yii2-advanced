<?php
namespace backend\logic\form;

use Yii;
use yii\base\Model;
use common\entities\User;



class UserUpdateForm extends Model
{
    public $username;
    public $email;
    public $status;
    public $role;
    
    public $_user;
	
	
	public function __construct(User $user, $role, $config = [])
    {
        if ($user) {
            $this->username = $user->username;
            $this->email = $user->email;
            $this->status = $user->status;
            $this->role = $role;
            
            $this->_user = $user;
        }
        parent::__construct($config);
    }
	

    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            ['email', 'email'],
            [['status', 'role'], 'safe'],
            ['username', 'string', 'max' => 255],
            [['username', 'email'], 'unique', 'targetClass' => User::class, 'filter' => $this->_user ? ['<>', 'id', $this->_user->id] : null]
        ];
    }
    
    
    public function attributeLabels()
    {
        return [
        	'email' => 'E-mail',
            'username' => 'Ім\'я',
            'role' => 'Роль',
            'status' => 'Активувати',
        ];
    }
    
    
}
