<?php
namespace frontend\tests;

use common\services\EmailServices;
use common\repositories\UserRepository;
use common\entities\User;



class SendEmailTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }
	
	//---------------------------------------------------------------//
	
    /**
	* Тест відправки на email коду підтвердження 
	*/
    public function testSendSignupConfirm()
    {
		$email = new EmailServices(new UserRepository);
		$this->assertTrue($email->sendSignup('t@t.ua'));
    }
    
    /**
	* Тест відправки на email коду підтвердження (невірного)
	*/
    public function testSendSignupError()
    {
		$email = new EmailServices(new UserRepository);
		$this->assertFalse($email->sendSignup('taras@t.ua'));
    }
    
    //---------------------------------------------------------------//
    
    /**
	* Тест відправки на email коду привітання після успішного підтвердження реєстрації 
	*/
    public function testSendUserConfirm()
    {
		$email = new EmailServices(new UserRepository);
		$user = User::findOne(1);
		$this->assertTrue($email->sendConfirmUser($user));
    }
    
    /**
	* Тест відправки на email коду привітання після успішного підтвердження реєстрації (невірного)
	*/
    public function testSendUserError()
    {
		$email = new EmailServices(new UserRepository);
		$user = User::findOne(112);
		$this->assertFalse($email->sendConfirmUser($user));
    }
    
    //---------------------------------------------------------------//
    
    /**
	* Тест відправки на email ссилки-токен для відновлення пароля 
	*/
    public function testResetPasswordConfirm()
    {
		$email = new EmailServices(new UserRepository);
		$user = User::findOne(1);
		$this->assertTrue($email->sendResetPassword($user));
    }
    
    /**
	* Тест відправки на email ссилки-токен для відновлення пароля (невірного)
	*/
    public function testResetPasswordError()
    {
		$email = new EmailServices(new UserRepository);
		$user = User::findOne(112);
		$this->assertFalse($email->sendResetPassword($user));
    }
    
    //---------------------------------------------------------------//
    
    /**
	* Тест відправки на email листа з новим паролем користувачу 
	*/
    public function testSendPasswordConfirm()
    {
		$email = new EmailServices(new UserRepository);
		$user = User::findOne(1);
		$this->assertTrue($email->sendConfirmPassword('123', $user));
    }
    
    /**
	* Тест відправки на email листа з новим паролем користувачу (невірного)
	*/
    public function testSendPasswordError()
    {
		$email = new EmailServices(new UserRepository);
		$user = User::findOne(112);
		$this->assertFalse($email->sendConfirmPassword('123', $user));
    }
    
    
}