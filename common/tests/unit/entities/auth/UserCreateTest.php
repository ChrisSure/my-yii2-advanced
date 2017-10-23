<?php
namespace common\tests\entities\auth;

use common\logic\entities\auth\User;


class UserCreateTest extends \Codeception\Test\Unit
{
	
    public function testSuccess()
    {
        $user = User::create(
            $username = 'Name',
            $email = 'mail@gmail.com',
            $password = '123456',
            $status = 1
        );

        $this->assertEquals($username, $user->username);
        $this->assertEquals($email, $user->email);
        $this->assertNotEmpty($user->password_hash);
        $this->assertNotEquals($password, $user->password_hash);
        $this->assertEquals($status, $user->status);
    }
    
}