<?php
namespace backend\tests;

use backend\tests\FunctionalTester;
use yii\helpers\Url;
use common\logic\entities\auth\User;
use common\logic\entities\auth\AuthAssign;



class UserCest
{
    public function _before(FunctionalTester $I)
    {
    	User::deleteAll(['>', 'id', 1]);
    	AuthAssign::deleteAll(['>', 'user_id', 1]);
    }

    public function _after(FunctionalTester $I)
    {
    }

    /*
    * Тест входить в адмінку і перевіряє добавлення, редагування та видалення користувача 
    */
    public function createTest(FunctionalTester $I)
    {
    	$I->amLoggedInAs(1);
    	$I->amOnPage(Url::toRoute('/auth/user/create'));
    	$I->see('Додати користувача', 'h1');
    	$I->fillField('input[name="UserForm[username]"]', 'Denis');
        $I->fillField('input[name="UserForm[email]"]', 'd@d.ua');
        $I->selectOption('#userform-role', 'user');
        $I->fillField('input[name="UserForm[password]"]', '123');
        $I->click('user-button');
        $I->see('Перегляд - Denis', 'h1');
        
        //update
        $I->click('Редагувати', '#update-user-test');
    	$I->see('Редагування користувача: Denis', 'h1');
    	$I->fillField('input[name="UserUpdateForm[username]"]', 'Denis');
        $I->fillField('input[name="UserUpdateForm[email]"]', 'd@d.ua');
        $I->selectOption('#userupdateform-role', 'admin');
        $I->click('user-button');
        $I->see('Перегляд - Denis', 'h1');
        
        //delete
        $I->click('Видалити');
        $I->dontSee('Denis');
        
    }
    
    
    
    
    
}

