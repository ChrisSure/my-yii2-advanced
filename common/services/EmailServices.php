<?php
namespace common\services;

use Yii;
use common\entities\User;
use common\repositories\UserRepository;


class EmailServices
{
	
	private $user_rep;
	
	public function __construct(UserRepository $user_rep)
	{
		$this->user_rep = $user_rep;
	}
	
	
	/**
	* Метод відправляє на пошту письмо з підтвердженням реєстрації
	* @param undefined $email
	* 
	* @return void
	*/
    public function sendSignup($email)
    {
	    if (!$user = $this->user_rep->findByEmail($email)) {
			return false;
		}
	    
		return Yii::$app->mailer->compose('confirmUser-html',
		['user'=>$user, 'logo' => Yii::getAlias('@img_path'). '/base/logo.png'])
	    ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name . ' robot'])
	    ->setTo($email)
	    ->setSubject(\Yii::t('app', 'Confirmation of registration') . $user->username)
	    ->send();
    }
    
    
    /**
	* Метод відправляє на пошту письмо з привітанням і повідомленням про успішну реєстрацію
	* @param undefined $email
	* 
	* @return void
	*/
    public function sendConfirmUser($user)
    {
    	if (!$user) return false;
		return Yii::$app->mailer->compose('confirmRegistration-html',
				['name'=>$user->username, 'logo' => Yii::getAlias('@img_path'). '/base/logo.png'])
				->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name . ' robot'])
				->setTo($user->email)
				->setSubject('Password reset for ' . $user->username)
				->send();
	}
	
	
	/**
	* Метод відсилає ссилку-токен для відновлення пароля
	* @param undefined $user
	* 
	* @return bool
	*/
	public function sendResetPassword($user)
	{
		if (!$user) return false;
		return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html'],
                ['user' => $user, 'logo' => Yii::getAlias('@img_path'). '/base/logo.png']
            )
            ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name . ' robot'])
            ->setTo($user->email)
            ->setSubject('Сброс пароля для ' . $user->username)
            ->send();
	} 
	
	
	/**
	* Метод відсилає лист з новим паролем користувачу
	* @param undefined $password
	* @param undefined $user
	* 
	* @return bool
	*/
	public function sendConfirmPassword($password, $user)
    {
    	if (!$user) return false;
		return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'resetPasswordEmail-html'],
                ['password' => $password, 'user'=>$user, 'logo' => Yii::getAlias('@img_path'). '/base/logo.png']
            )
            ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name . ' robot'])
            ->setTo($user->email)
            ->setSubject(\Yii::t('app', 'Reset password for'). $user->username)
            ->send();
	}
	
	
	
	
}
?>