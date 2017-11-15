<?php
namespace frontend\tests\forms\auth;

use frontend\logic\form\auth\ResetPasswordForm;


class ReserFormTest extends \Codeception\Test\Unit
{
	/**
	* Тест форми відновлення пароля
	*/
    public function testSuccess()
    {
        $model = new ResetPasswordForm();

        $model->attributes = [
            'password' => 'tester',
        ];

        expect_that($model->validate(['password']));
    }
    
}