<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\logic\form\auth\AdminLoginForm;
use common\logic\services\auth\LoginServices;



class SiteController extends Controller
{
    
    private $loginServ;
    
    
    public function __construct($id, $module, LoginServices $loginServ, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->loginServ = $loginServ;
    }
    
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $form = new AdminLoginForm();
        if ($form->load(Yii::$app->request->post())) {
			if ($this->loginServ->loginUserByEmail($form->email, $form->password, $form->rememberMe, $admin = true)) {
				return $this->redirect('/admin');
			} else {
				Yii::$app->session->setFlash('danger', 'Ви ввели невірний логін або пароль.');
				return $this->redirect('/admin');
			}
        }
        return $this->render('login', ['model' => $form]);
    }
    
    
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    
}