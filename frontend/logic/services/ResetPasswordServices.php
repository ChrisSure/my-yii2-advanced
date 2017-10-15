<?php
namespace frontend\logic\services;

use Yii;
use common\entities\User;
use common\services\LoginServices;
use common\services\EmailServices;
use common\repositories\UserRepository;
use yii\web\BadRequestHttpException;



class ResetPasswordServices
{
	private $send;
	private $user_rep;
	private $login;
	
	
	public function __construct(EmailServices $send, UserRepository $user_rep, LoginServices $login)
	{
		$this->send = $send;
		$this->user_rep = $user_rep;
		$this->login = $login;
	}
	
	/**
	* Метод відправляє на пошту ссилку на відновлення пароля, якщо введено вірний email
	* @param undefined $email
	* 
	* @return bool
	*/
	public function sendEmailReset($email)
	{
		if (!$user = User::findOne(['status' => User::STATUS_ACTIVE, 'email' => $email])) return false;
		
		if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            $user->save(false);
        }
        $this->send->sendResetPassword($user);
        return true;
	}
	
	/**
	* Метод перевіряє token
	* @param undefined $token
	* 
	* @return bool
	*/
	public function validateToken($token)
	{
		if (empty($token) || !is_string($token)) {
            throw new \DomainException('Password reset token cannot be blank.');
        }
        if (!$this->user_rep->existsByPasswordResetToken($token)) {
            throw new \DomainException('Wrong password reset token.');
        }
        return true;
	}
	
	
	/**
	* Метод встановлює новий пароль
	* @param undefined $password
	* @param undefined $token
	* 
	* @return bool
	*/
	public function resetPassword($password, $token)
	{
		$user = $this->user_rep->existsByPasswordResetToken($token);
		$user->password_hash = Yii::$app->security->generatePasswordHash($password);
		
		$this->user_rep->save($user);
        $this->login->loginUser($user);
		$this->send->sendConfirmPassword($password, $user);
		return true;
	}
    
	
}
?>