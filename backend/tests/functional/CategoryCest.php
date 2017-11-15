<?php
namespace backend\tests;

use backend\tests\FunctionalTester;
use yii\helpers\Url;
use common\logic\entities\blog\Category;



class CategoryCest
{
    public function _before(FunctionalTester $I)
    {
    	Category::deleteAll(['>', 'id', 1]);
    }

    public function _after(FunctionalTester $I)
    {
    }

    /*
    * Тест входить в адмінку і перевіряє добавлення, редагування та видалення категорій 
    */
    public function createTest(FunctionalTester $I)
    {
    	$I->amLoggedInAs(1);
    	$I->amOnPage(Url::toRoute('/blog/category/create'));
    	$I->see('Додати категорію', 'h1');
    	$I->selectOption('#categoryform-parentid', 1);
    	$I->fillField('input[name="CategoryForm[slug]"]', 'category_1');
        $I->fillField('input[name="CategoryForm[name]"]', 'Category 1');
        $I->click('category-button');
        $I->see('Category 1', 'h1');
        
        //update
        $I->click('Редагувати', '#update-category-test');
    	$I->see('Редагування: Category 1', 'h1');
    	$I->selectOption('#categoryform-parentid', 1);
    	$I->fillField('input[name="CategoryForm[slug]"]', 'category_1');
        $I->fillField('input[name="CategoryForm[name]"]', 'Category 1');
        $I->click('category-button');
        $I->see('Category 1', 'h1');
        
        //delete
        $I->click('Видалити');
        $I->dontSee('Category 1');
        
    }
    
    
    
    
    
}
