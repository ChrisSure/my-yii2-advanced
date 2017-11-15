<?php
namespace backend\tests;

use backend\tests\FunctionalTester;
use yii\helpers\Url;



class SettingCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    /*
    * Тест входить в адмінку і перевіряє редагування настройок
    */
    public function updateTest(FunctionalTester $I)
    {
    	$I->amLoggedInAs(1);
    	$I->amOnPage(Url::toRoute('/system/setting/view'));
    	$I->see('Настройки', 'h1');
    	$I->fillField('input[name="SettingForm[title]"]', 'Basic_new');
        $I->click('setting-button');
        $I->see('Настройки успішно змінені');
    }
    
    
    
    
    
}

