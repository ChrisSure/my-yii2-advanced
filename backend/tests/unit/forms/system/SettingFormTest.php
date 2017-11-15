<?php

namespace backend\tests\forms\auth;

use backend\logic\form\system\SettingForm;


/**
* Тест перевіряє форму редагування настройок
*/
class SettingFormTest extends \Codeception\Test\Unit
{
	
    public function testSuccess()
    {
        $model = new SettingForm();

        $model->attributes = [
            'title' => 'Tester title',
            'description' => 'Tester description',
            'keywords' => 'Tester keywords',
            'address' => 'Tester address',
            'phone' => '0987466672',
            'email' => 'test@gmail.com',
            
        ];

        expect_that($model->validate(['title', 'description', 'keywords', 'address', 'phone', 'email']));
    }
    
}