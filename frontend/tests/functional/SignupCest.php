<?php
namespace frontend\tests;
use frontend\tests\FunctionalTester;
use yii\helpers\Url;


class SignupCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    /*
    * Тест перевіряє реєстрацію користувача 
    */
    public function confirmTest(FunctionalTester $I)
    {
    	$I->amOnPage(Url::toRoute('/auth/signup'));
    	$I->see('Реєстрація', 'h1');
    	$I->fillField('input[name="SignupForm[username]"]', 'yura');
    	$I->fillField('input[name="SignupForm[email]"]', 'y@y.ua');
    	$I->fillField('input[name="SignupForm[password]"]', '12345');
    	//$I->fillField('input[name="SignupForm[reCaptcha]"]', true);
    	
    	//$I->click('signup-button');
    	//$I->see('Перевірте свою електронну пошту для подальших інструкцій.');
    }
    
    /*
    * Тест перевіряє реєстрацію користувача (введення існуючого пароля)
    */
    public function errorEmailTest(FunctionalTester $I)
    {
    	$I->amOnPage(Url::toRoute('/auth/signup'));
    	$I->see('Реєстрація', 'h1');
    	$I->fillField('input[name="SignupForm[username]"]', 'yura');
    	$I->fillField('input[name="SignupForm[email]"]', 't@t.ua');
    	$I->fillField('input[name="SignupForm[password]"]', '12345');
    	
    	$I->click('signup-button');
    	$I->see('This email address has already been taken.');
    }
    
    
    /*
    * Тест перевіряє реєстрацію користувача (введення неправельної каптчі)
    */
    public function errorCaptchaTest(FunctionalTester $I)
    {
    	$I->amOnPage(Url::toRoute('/auth/signup'));
    	$I->see('Реєстрація', 'h1');
    	$I->fillField('input[name="SignupForm[username]"]', 'yura');
    	$I->fillField('input[name="SignupForm[email]"]', 't@t.ua');
    	$I->fillField('input[name="SignupForm[password]"]', '12345');
    	
    	$I->click('signup-button');
    	$I->see('Неправильний код перевірки.');
    }
    
}
