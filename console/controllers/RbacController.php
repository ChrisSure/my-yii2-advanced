<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
		
		// добавляем роль "user"
        $user = $auth->createRole('user');
        $auth->add($user);
		
        // добавляем роль "admin"
        // а также все разрешения роли "user"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
    
        // добавляем роль "super_admin"
        $super_admin = $auth->createRole('super_admin');
        $auth->add($super_admin);
        $auth->addChild($super_admin, $admin);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($super_admin, 1);
        $auth->assign($admin, 2);
        $auth->assign($user, 3);
    }
}