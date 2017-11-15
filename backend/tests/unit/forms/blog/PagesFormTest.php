<?php
namespace backend\tests\forms\blog;

use backend\logic\form\blog\PagesForm;

/**
* Тест перевіряє форму crud сторінки
*/
class PagesFormTest extends \Codeception\Test\Unit
{
	
    public function testSuccess()
    {
        $model = new PagesForm();

        $model->attributes = [
            'name' => 'Tester name',
            'slug' => 'test',
            'text' => 'Tester title',
            'title' => 'Tester title',
            'description' => 'Tester description',
            'keywords' => 'Tester keywords',
            'status' => 1,
        ];

        expect_that($model->validate(['name', 'slug', 'text','title', 'description', 'keywords', 'status']));
    }
    
}