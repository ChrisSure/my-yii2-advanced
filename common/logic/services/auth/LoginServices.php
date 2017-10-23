<?php
namespace common\logic\services\auth;

use Yii;
use common\logic\entities\auth\User;
use common\logic\entities\auth\Assignment;
use common\logic\repositories\auth\UserRepository;
use common\logic\services\security\SecurityServices;
use yii\web\BadRequestHttpException;


class LoginServices
{
	
	private $user_rep;
	private $secServ;
	private $_user;
	
	
	public function __construct(UserRepository $user_rep, SecurityServices $secServ)
	{
		$this->user_rep = $user_rep;
		$this->secServ = $secServ;
	}
	
	
	/**
	* Метод просто логінить користувача
	* @param undefined $user
	* @param undefined $time
	* 
	* @return bool
	*/
	public function loginUser($user)
	{
		if (!Yii::$app->user->login($user,  3600 * 24 * 30)) {
			throw new BadRequestHttpException('Невдалось залогінитись');
		}
		return true;
	}
	
	
	/**
	* Метод логінить користувача під час входу, визиває метод валідності пароля
	* @param obj $form
	* @param int $admin
	* 
	* @return bool
	*/
	public function loginUserByEmail($email, $password, $rememberMe, $admin = false)
	{
		$user = User::find()->joinWith('auth')->where(['user.email' => $email])->andwhere(['user.status' => User::STATUS_ACTIVE])->one();
		
		if (!$user || !$this->validatePassword($user, $password)) {
			$this->secServ->logAttempt(Yii::$app->request->userIP);
			return false;
		} else {
			if ($admin) {
				if (!$this->isAdmin($user)) {
					$this->secServ->logAttempt(Yii::$app->request->userIP);
				 	return false;
				}
			}
			if (!Yii::$app->user->login($user, ($rememberMe) ? 3600 * 24 * 30 : 0)) {
				throw new BadRequestHttpException('Невдалось залогінитись.');
			}
		}
		return true;
	}
	
	
	/**
	* Метод перевіряє правильність паролю
	* @param undefined $user
	* @param undefined $password
	* 
	* @return bool
	*/
	private function validatePassword($user, $password)
    {
	    if (!Yii::$app->security->validatePassword($password, $user->password_hash)) {
			return false;
		}
		return true;
    }
	
	
	/**
	* Метод створює об'єкт user, якщо вже створений просто його повертає
	* @param string $email
	* 
	* @return object
	*/
	private function getUser($email)
    {
        if ($this->_user === null) {
            $this->_user = User::findOne(['email' => $email]);
        }
        return $this->_user;
    }
	
	
	/**
	* Метод перевіряє чи в адмінку заходить користувач з правами admin || super_admin
	* @param undefined $user
	* 
	* @return bool
	*/
	private function isAdmin($user)
	{
		$res = Assignment::find()->where(['user_id'=>$user->id])->one();
		if ($res->item_name == 'admin' || $res->item_name == 'super_admin') {
			 return true;
		}  
		return false;
	}
	
	
	
}
?>