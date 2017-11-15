<?php

namespace frontend\controllers\auth;

use Yii;
use yii\web\Controller;
use yii\web\BadRequestHttpException;

use frontend\logic\form\auth\PasswordResetRequestForm;
use frontend\logic\form\auth\ResetPasswordForm;
use frontend\logic\services\auth\ResetPasswordServices;

/**
* Контроллер скинення пароля
*/
class ResetController extends Controller
{
	
	private $service;
	
	public function __construct($id, $module, ResetPasswordServices $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        
        $this->service = $service;
    }
    
  
	/**
	* Скинення пароля, на E-mail висилається токен
	*/
    public function actionRequestPasswordReset()
    {
        $form = new PasswordResetRequestForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
        	try {
	            $this->service->sendEmailReset($form->email);
	            Yii::$app->session->setFlash('success', 'Перевірте свою електронну пошту для подальших інструкцій.');
                return $this->goHome();
			} catch(\DomainException $e) {
				Yii::$app->errorHandler->logException($e);
	            Yii::$app->session->setFlash('error', $e->getMessage());
			}
        }
        return $this->render('requestPasswordResetToken', ['model' => $form]);
    }

	/**
	* Встановлення нового пароля
	*/
    public function actionResetPassword($token)
    {
    	try {
            $this->service->validateToken($token);
        } catch (\DomainException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
    	
        $form = new ResetPasswordForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
        	try {
	            $this->service->resetPassword($form->password, $token);
	            Yii::$app->session->setFlash('success', 'Новий пароль збережено.');
            	return $this->goHome();
	        } catch (\DomainException $e) {
	            throw new BadRequestHttpException($e->getMessage());
	        }
        }
        return $this->render('resetPassword', ['model' => $form]);
    }
	
	
}
?>