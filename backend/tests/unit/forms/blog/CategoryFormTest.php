<?php
namespace backend\tests\forms\blog;

use backend\logic\form\blog\CategoryForm;

/**
* Тест перевіряє форму crud категорії
*/
class CategoryFormTest extends \Codeception\Test\Unit
{
	
    public function testSuccess()
    {
        $model = new CategoryForm();

        $model->attributes = [
            'name' => 'Tester name',
            'slug' => 'test',
            'title' => 'Tester title',
            'description' => 'Tester description',
            'keywords' => 'Tester keywords',
            'parentId' => 1,
            
        ];

        expect_that($model->validate(['name', 'slug', 'title', 'description', 'keywords', 'parentId']));
    }
    
}