<?php

namespace frontend\logic\services;

use common\entities\User;
use common\repositories\UserRepository;

class NetworkService
{
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

	
	/**
	* Метод добавляє користувача через соц.мережі і встановлює для нього роль
	* 
	* @param undefined $network
	* @param undefined $identity
	* @param undefined $name
	* 
	* @return array
	*/
    public function auth($network, $identity, $name)
    {
        if ($user = $this->users->findByNetworkIdentity($network, $identity)) {
            return $user;
        }
        $user = User::signupByNetwork($network, $identity, $name);
        //Встановлюємо роль
        $auth = \Yii::$app->authManager;
        $authorRole = $auth->getRole('user');
        $auth->assign($authorRole, $user->getId());
        return $user;
    }
	
}