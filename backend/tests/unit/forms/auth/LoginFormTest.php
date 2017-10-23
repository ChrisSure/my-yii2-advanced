<?php
namespace backend\tests\forms\auth;

use backend\logic\form\auth\AdminLoginForm;


class LoginFormTest extends \Codeception\Test\Unit
{
	
    public function testSuccess()
    {
        $model = new AdminLoginForm();

        $model->attributes = [
            'email' => 't@t.ua',
            'password' => 'tester',
        ];

        expect_that($model->validate(['email', 'password']));
    }
    
}