<?php
namespace frontend\tests\forms\auth;

use frontend\logic\form\auth\SignupForm;


class SignupFormTest extends \Codeception\Test\Unit
{
	
    public function testSuccess()
    {
        $model = new SignupForm();

        $model->attributes = [
        	'username' => 'Tarasik',
            'email' => 'taras@t.ua',
            'password' => 'tester',
        ];

        expect_that($model->validate(['username', 'email', 'password']));
    }
    
}