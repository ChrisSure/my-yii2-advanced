<?php
namespace frontend\tests;
use common\logic\services\auth\LoginServices;
use common\logic\repositories\auth\UserRepository;
use common\logic\services\system\SecurityServices;
use common\logic\repositories\system\SecurityRepository;


class LoginTest extends \Codeception\Test\Unit
{
    
    protected $tester;
    private $obj;

    protected function _before()
    {
    	$this->obj = new LoginServices(new UserRepository(), new SecurityServices(new SecurityRepository));
    }

    protected function _after()
    {
    }

    /**
	* Тест входу на сайт, перевірка методу (сервісу) loginUserByEmail
	*/
    public function testLoginConfirm()
    {
		$this->assertTrue($this->obj->loginUserByEmail('t@t.ua', '123', 1));
    }
    
    
    /**
	* Тест входу на сайт (невірний), перевірка методу (сервісу) loginUserByEmail
	*/
    public function testLoginError()
    {
		$this->assertFalse($this->obj->loginUserByEmail('tфкфі@t.ua', '1234', 1));
    }
    
    
}