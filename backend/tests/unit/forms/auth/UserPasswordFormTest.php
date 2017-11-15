<?php

namespace backend\tests\forms\auth;

use backend\logic\form\auth\UserPasswordForm;


/**
* Тест перевіряє форму зміни пароля користувача
*/
class UserPasswordFormTest extends \Codeception\Test\Unit
{
	
    public function testSuccess()
    {
        $model = new UserPasswordForm();

        $model->attributes = [
            'password' => '1234',
        ];

        expect_that($model->validate(['password']));
    }
    
}