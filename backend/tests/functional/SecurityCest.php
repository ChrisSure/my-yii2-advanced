<?php
namespace backend\tests;

use backend\tests\FunctionalTester;
use yii\helpers\Url;
use common\logic\entities\system\Security;



class SecurityCest
{
    public function _before(FunctionalTester $I)
    {
    	Security::deleteAll();
    }

    public function _after(FunctionalTester $I)
    {
    }

    /*
    * Тест входить в адмінку і перевіряє добавлення, редагування та видалення заблокованих IP 
    */
    public function createTest(FunctionalTester $I)
    {
    	$I->amLoggedInAs(1);
    	$I->amOnPage(Url::toRoute('/system/security/create'));
    	$I->see('Додати IP', 'h1');
    	$I->fillField('input[name="SecurityForm[ip]"]', '123456');
        $I->click('security-button');
        $I->see('123456', 'h1');
        
        //update
        $I->click('Редагувати', '#update-security-test');
    	$I->see('Редагування: 123456', 'h1');
    	$I->fillField('input[name="SecurityForm[ip]"]', '123456');
        $I->click('security-button');
        $I->see('123456', 'h1');
        
        //delete
        $I->click('Видалити');
        $I->dontSee('123456');
        
    }
    
    
    
    
    
}
