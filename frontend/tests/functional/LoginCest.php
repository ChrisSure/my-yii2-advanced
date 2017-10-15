<?php
namespace frontend\tests;
use frontend\tests\FunctionalTester;
use yii\helpers\Url;


class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    /*
    * Тест перевіряє вхід (login) та вихід (logout) 
    */
    public function loginTest(FunctionalTester $I)
    {
    	$I->amOnPage(Url::toRoute('/auth/login'));
    	$I->see('Вхід', 'h1');
    	$I->fillField('input[name="LoginForm[email]"]', 't@t.ua');
        $I->fillField('input[name="LoginForm[password]"]', '123');
        $I->click('login-button');
		
        $I->see('Logout (taras)');
	}
	
	/*
    * Тест перевіряє вхід login (неправельний логін і пароль) 
    * В тестовій базі при logAttempt (поле Ip за замовчуванням null) інакше помилка
    */
    public function errorTest(FunctionalTester $I)
    {
    	$I->amOnPage(Url::toRoute('/auth/login'));
    	$I->see('Вхід', 'h1');
    	$I->fillField('input[name="LoginForm[email]"]', 'error@t.ua');
        $I->fillField('input[name="LoginForm[password]"]', '1234');
        $I->click('login-button');
		
        $I->see('Ви ввели невірний логін або пароль.');
	}
	
}
