<?php
namespace frontend\tests;
use common\services\LoginServices;
use common\repositories\UserRepository;
use common\services\SecurityServices;
use common\repositories\SecurityRepository;


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