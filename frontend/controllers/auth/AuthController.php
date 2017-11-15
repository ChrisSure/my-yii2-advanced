<?php

namespace frontend\controllers\auth;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

use frontend\logic\form\auth\LoginForm;
use common\logic\services\auth\LoginServices;
use common\logic\entities\system\Logs;


/**
* Контроллер авторизації
*/
class AuthController extends Controller
{
	
	private $service;
	
	public function __construct($id, $module, LoginServices $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
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
			if ($this->service->loginUserByEmail($form->email, $form->password, $form->rememberMe)) {
				return $this->goHome();
			} else {
				Logs::add('Невдала спроба входу на сайт. Email - ' . $form->email . ' ||| Login - ' . $form->password , __FILE__, 4); //Add log
				Yii::$app->session->setFlash('danger', 'Ви ввели невірний логін або пароль.');
				return $this->redirect('/auth/login');
			}
        }
        return $this->render('login', ['model' => $form]);
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