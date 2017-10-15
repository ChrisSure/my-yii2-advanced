<?php
namespace frontend\tests;
use frontend\tests\FunctionalTester;
use yii\helpers\Url;


class SetNewPasswordCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }
    
    /*
    * Тест перевіряє токен, який прийшов (токен завідомо неправельний - має виплисти помилка)  
    */
    public function errorTest(FunctionalTester $I)
    {
    	$I->amOnPage(Url::toRoute('/auth/reset-password?token=fwj4UJ5RqBSqdVG73SebjTNJIOLi4sHf_1507698527'));
    	
    	$I->see('Wrong password reset token.');
    }
    
    
    
}
