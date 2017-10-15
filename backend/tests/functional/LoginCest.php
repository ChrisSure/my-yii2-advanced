<?php
namespace backend\tests;
use backend\tests\FunctionalTester;
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
    	$I->amOnPage(Url::toRoute('/site/login'));
    	$I->see('Увійдіть, щоб розпочати сеанс', 'p');
    	$I->fillField('input[name="AdminLoginForm[email]"]', 't@t.ua');
        $I->fillField('input[name="AdminLoginForm[password]"]', '123');
        $I->click('login-button');
		
        $I->see('Congratulation', 'h1');
	}
	
	/*
    * Тест перевіряє вхід login (неправельний логін і пароль) 
    * В тестовій базі при logAttempt (поле Ip за замовчуванням null) інакше помилка
    */
    public function errorTest(FunctionalTester $I)
    {
    	$I->amOnPage(Url::toRoute('/site/login'));
    	$I->see('Увійдіть, щоб розпочати сеанс', 'p');
    	$I->fillField('input[name="AdminLoginForm[email]"]', 'taras@t.ua');
        $I->fillField('input[name="AdminLoginForm[password]"]', '12345');
        $I->click('login-button');
		
        $I->see('Ви ввели невірний логін або пароль.');
	}
}
