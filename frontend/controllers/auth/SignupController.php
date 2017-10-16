<?php

namespace frontend\controllers\auth;

use Yii;
use yii\web\Controller;

use frontend\logic\form\auth\SignupForm;
use common\logic\services\auth\SignupServices;


/**
* Контроллер авторизації, реєстрації та скинення пароля
*/
class SignupController extends Controller
{
	
	private $service;
	
	public function __construct($id, $module, SignupServices $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }
    
	
    /**
	* Реєстраці
	*/
    public function actionSignup()
    {
        $form = new SignupForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
        	try {
            	$this->service->signup($form->email, $form->username, $form->password);
            	Yii::$app->session->setFlash('success', 'Перевірте свою електронну пошту для подальших інструкцій.');
            	return $this->goHome();
			} catch(\DomainException $e) {
				Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
			}
		}
        return $this->render('signup', ['model' => $form]);
    }
    
   	/**
	* Підтвердження реєстрації
	*/
    public function actionConfirmUser($token)
    {
    	try {
            $this->service->confirmUser($token);
            Yii::$app->session->setFlash('success', 'Вітаємо з вашою успішною реєстрацією.');
			return $this->goHome();
		} catch(\DomainException $e) {
			Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
		}
    }
    
	
}
?>