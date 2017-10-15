<?php
namespace frontend\tests;

use common\services\SignupServices;
use common\services\EmailServices;
use common\services\LoginServices;
use common\repositories\UserRepository;
use common\services\SecurityServices;
use common\repositories\SecurityRepository;


class SignupTest extends \Codeception\Test\Unit
{
    
    protected $tester;
	private $obj;
	 
	 
    protected function _before()
    {
    	$this->obj = new SignupServices(new EmailServices(new UserRepository), new LoginServices(new UserRepository(), new SecurityServices(new SecurityRepository)), new UserRepository());
    }

    protected function _after()
    {
    }

    /**
	* Тест реєстрації на сайті методу (сервісу) signup
	*/
    public function testSignupConfirm()
    {
		$this->assertTrue($this->obj->signup('taras@t.ua', 'tarasik', '123456'));
    }
    
    /**
	* Тест підтвердження реєстрації на сайті методу (сервісу) confirmUser
	*/
    public function testSignupConfirmPlus()
    {
		$this->assertTrue($this->obj->confirmUser('c3o1IQB6mJSlYCTaySbmmopbLIYYTqrz_1507636741'));
    }
    
    
    
    /*
    public function testSignupError()
    {
		$this->assertFalse($this->obj->signup('t@t.ua', 'tarasik', '123456'));
    }
    */
    
    
    
    
}