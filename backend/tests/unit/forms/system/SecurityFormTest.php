<?php

namespace backend\tests\forms\auth;

use backend\logic\form\system\SecurityForm;


/**
* Тест перевіряє форму crud блокування по IP
*/
class SecurityFormTest extends \Codeception\Test\Unit
{
	
    public function testSuccess()
    {
        $model = new SecurityForm();

        $model->attributes = [
            'ip' => '23456'
        ];

        expect_that($model->validate(['ip']));
    }
    
}