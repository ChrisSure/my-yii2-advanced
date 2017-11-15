<?php
namespace frontend\tests\forms\auth;

use frontend\logic\form\auth\PasswordResetRequestForm;


class RequestFormTest extends \Codeception\Test\Unit
{
	/**
	* Тест форми скидання пароля
	*/
    public function testSuccess()
    {
        $model = new PasswordResetRequestForm();

        $model->attributes = [
            'email' => 't@t.ua',
        ];

        expect_that($model->validate(['email']));
    }
    
}