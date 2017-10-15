<?php
namespace frontend\tests;

use frontend\logic\services\ResetPasswordServices;
use common\services\EmailServices;
use common\repositories\UserRepository;
use common\services\LoginServices;
use common\services\SecurityServices;
use common\repositories\SecurityRepository;


class ResetTest extends \Codeception\Test\Unit
{
    
    protected $tester;
    private $obj;

    protected function _before()
    {
    	$this->obj = new ResetPasswordServices(new EmailServices(new UserRepository), new UserRepository(), new LoginServices(new UserRepository(), new SecurityServices(new SecurityRepository)));
    }

    protected function _after()
    {
    }

    /**
	* Тест для перевірки методу (сервісу для встановлення нового пароля) sendEmailReset
	*/
    public function testResetConfirm()
    {
		$this->assertTrue($this->obj->sendEmailReset('t@t.ua'));
    }
    
    /**
	* Тест для перевірки (невірний) методу (сервісу для відправки email для нового пароля) sendEmailReset
	*/
    public function testResetError()
    {
		$this->assertFalse($this->obj->sendEmailReset('taras@t.ua'));
    }
    
    
    ////////////////////////////////////////////////////////////////////////
    
    
    /**
	* Тест для перевірки методу (сервісу для перевірки токена) validateToken
	*/
    public function testTokenConfirm()
    {
		$this->assertTrue($this->obj->validateToken('c3o1IQB6mJSlYCTaySbmmopbLIYYTqrz_1507636741'));
    }
    
    //////////////////////////////////////////////////////////////////////////
    
    /**
	* Тест для перевірки методу (сервісу для встановлення нового пароля) resetPassword
	*/
    public function testPasswordConfirm()
    {
		$this->assertTrue($this->obj->resetPassword('123', 'c3o1IQB6mJSlYCTaySbmmopbLIYYTqrz_1507636741'));
    }
    
    
    
}