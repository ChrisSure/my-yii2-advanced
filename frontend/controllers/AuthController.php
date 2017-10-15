<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;

use frontend\logic\form\SignupForm;
use frontend\logic\form\LoginForm;
use frontend\logic\form\PasswordResetRequestForm;
use frontend\logic\form\ResetPasswordForm;

use common\services\SignupServices;
use common\services\LoginServices;
use frontend\logic\services\ResetPasswordServices;

/**
* Контроллер авторизації, реєстрації та скинення пароля
*/
class AuthController extends Controller
{
	
	private $signupServ;
	private $loginServ;
	private $resetServ;
	
	public function __construct($id, $module, SignupServices $signupServ, LoginServices $loginServ, ResetPasswordServices $resetServ, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->signupServ = $signupServ;
        $this->loginServ = $loginServ;
        $this->resetServ = $resetServ;
    }
    
    
    /**
	* Поведення для виходу з кабінету для ролі user
	* 
	* @return
	*/
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['user', 'admin', 'super_admin'],
                    ],
                ],
            ],
        ];
    }
    
	
	/**
	* Авторизація
	*/
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $form = new LoginForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
			if ($this->loginServ->loginUserByEmail($form->email, $form->password, $form->rememberMe)) {
				return $this->goHome();
			} else {
				Yii::$app->session->setFlash('danger', 'Ви ввели невірний логін або пароль.');
				return $this->redirect('/auth/login');
			}
        }
        return $this->render('login', ['model' => $form]);
    }
    
    /**
	* Реєстраці
	*/
    public function actionSignup()
    {
        $form = new SignupForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
        	try {
            	$this->signupServ->signup($form->email, $form->username, $form->password);
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
            $this->signupServ->confirmUser($token);
            Yii::$app->session->setFlash('success', 'Вітаємо з вашою успішною реєстрацією.');
			return $this->goHome();
		} catch(\DomainException $e) {
			Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
		}
    }
    
	/**
	* Скинення пароля, на E-mail висилається токен
	*/
    public function actionRequestPasswordReset()
    {
        $form = new PasswordResetRequestForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
        	try {
	            $this->resetServ->sendEmailReset($form->email);
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
            $this->resetServ->validateToken($token);
        } catch (\DomainException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
    	
        $form = new ResetPasswordForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
        	try {
	            $this->resetServ->resetPassword($form->password, $token);
	            Yii::$app->session->setFlash('success', 'Новий пароль збережено.');
            	return $this->goHome();
	        } catch (\DomainException $e) {
	            throw new BadRequestHttpException($e->getMessage());
	        }
        }
        return $this->render('resetPassword', ['model' => $form]);
    }
	
	/**
	* Вихід з аккаунта
	*/
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(Yii::$app->request->referrer);
    }
	
	
}
?>