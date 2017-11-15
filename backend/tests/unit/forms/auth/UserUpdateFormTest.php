<?php

namespace backend\tests\forms\auth;

use backend\logic\form\auth\UserUpdateForm;
use common\logic\entities\auth\User;


/**
* Тест перевіряє форму редагування користувача
*/
class UserUpdateFormTest extends \Codeception\Test\Unit
{
	
    public function testSuccess()
    {
    	$user = User::findOne(1);
        $model = new UserUpdateForm($user, 'user');

        $model->attributes = [
            'username' => 'Tester',
            'email' => 'tester@gmail.com',
            'role' => 'user',
            'status' => 1,
        ];

        expect_that($model->validate(['username', 'email', 'role', 'status']));
    }
    
}