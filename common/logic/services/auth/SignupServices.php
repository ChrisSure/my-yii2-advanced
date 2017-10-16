<?php
namespace common\logic\services\auth;

use Yii;
use common\logic\entities\auth\User;
use common\logic\repositories\auth\UserRepository;
use common\logic\services\EmailServices;
use yii\web\BadRequestHttpException;



class SignupServices
{
	private $send;
	private $login;
	private $user_rep;
	
	
	public function __construct(EmailServices $send, LoginServices $login, UserRepository $user_rep)
	{
		$this->send = $send;
		$this->login = $login;
		$this->user_rep = $user_rep;
	}
	
	/**
	* Метод реєструє користувача, і висилає код підтвердження на E-mail
	* @param undefined $model
	* 
	* @return void
	*/
    public function signup($email, $username, $password)
    {
        $user = new User();
        $user->email = $email;
        $user->username = $username;
        $user->setPassword($password);
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
        $user->status = User::STATUS_DELETED;
        $user->created_at = time();
        
        if (!$user->save(false)) {
        	return false;
		} else {
			//Встановлюємо роль
        	$auth = Yii::$app->authManager;
        	$authorRole = $auth->getRole('user');
        	$auth->assign($authorRole, $user->getId());
        	//Відправляємо на пошту код підтвердження
        	if (!$this->send->sendSignup($email))
        		throw new \RuntimeException('Email send error.');
        	return true;
		}
    }
    
    
    
    /**
	* Метод підтверджує реєстрацію користувача, і висилає на E-mail лист привітання
	* @param undefined $token
	* 
	* @return void
	*/
    public function confirmUser($token){
    	$user = $this->user_rep->existsByPasswordResetToken($token);
    	if (!$user)
    		throw new BadRequestHttpException('Невірний код підтвердження.');
    	$user->status = User::STATUS_ACTIVE;
    	if ($user->save(false) && $this->login->loginUser($user)) {
			if (!$this->send->sendConfirmUser($user))
				throw new \RuntimeException('Email send error.');
			return true;
		}
	}
    
	
}
?>