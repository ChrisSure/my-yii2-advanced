<?php
namespace frontend\tests;
use frontend\tests\FunctionalTester;
use yii\helpers\Url;


class ResetCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    /*
    * Тест перевіряє відновлення паролю (введення існуючого пароля) 
    */
    public function confirmTest(FunctionalTester $I)
    {
    	$I->amOnPage(Url::toRoute('/auth/request-password-reset'));
    	$I->see('Відновлення паролю', 'h1');
    	$I->fillField('input[name="PasswordResetRequestForm[email]"]', 't@t.ua');
    	$I->click('reset-button');
    	
    	$I->see('Перевірте свою електронну пошту для подальших інструкцій.');
    }
    
    /*
    * Тест перевіряє відновлення паролю (введення неіснуючого пароля) 
    */
    public function errorTest(FunctionalTester $I)
    {
    	$I->amOnPage(Url::toRoute('/auth/request-password-reset'));
    	$I->see('Відновлення паролю', 'h1');
    	$I->fillField('input[name="PasswordResetRequestForm[email]"]', 'error@t.ua');
    	$I->click('reset-button');
    	
    	$I->see('Необхідно заповнити «Email».');
    }
    
    
    
}
