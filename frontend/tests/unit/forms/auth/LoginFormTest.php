<?php
namespace frontend\tests\forms\auth;

use frontend\logic\form\auth\LoginForm;



class LoginFormTest extends \Codeception\Test\Unit
{
	/**
	* Тест форми логіну
	*/
   	public function testSuccess()
    {
        $model = new LoginForm();

        $model->attributes = [
            'email' => 't@t.ua',
            'password' => 'tester',
        ];

        expect_that($model->validate(['email', 'password']));
    }
    
}