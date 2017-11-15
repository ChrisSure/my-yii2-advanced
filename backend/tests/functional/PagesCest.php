<?php
namespace backend\tests;

use backend\tests\FunctionalTester;
use yii\helpers\Url;
use common\logic\entities\blog\Pages;



class PagesCest
{
    public function _before(FunctionalTester $I)
    {
    	Pages::deleteAll();
    }

    public function _after(FunctionalTester $I)
    {
    }

    /*
    * Тест входить в адмінку і перевіряє добавлення, редагування та видалення сторінок 
    */
    public function createTest(FunctionalTester $I)
    {
    	$I->amLoggedInAs(1);
    	$I->amOnPage(Url::toRoute('/blog/pages/create'));
    	$I->see('Додати сторінку', 'h1');
    	$I->fillField('input[name="PagesForm[slug]"]', 'page_1');
        $I->fillField('input[name="PagesForm[name]"]', 'Page 1');
        $I->click('pages-button');
        $I->see('Page 1', 'h1');
        
        //update
        $I->click('Редагувати', '#update-pages-test');
    	$I->see('Редагування сторінки:', 'h1');
    	$I->fillField('input[name="PagesForm[slug]"]', 'page_1');
        $I->fillField('input[name="PagesForm[name]"]', 'Page 1');
        $I->click('pages-button');
        $I->see('Page 1', 'h1');
        
        //delete
        $I->click('Видалити');
        $I->dontSee('Page 1');
        
    }
    
    
    
    
    
}
