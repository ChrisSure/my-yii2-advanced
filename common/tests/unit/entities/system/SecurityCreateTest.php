<?php

namespace common\tests\entities\system;

use common\logic\entities\system\Security;



class SecurityCreateTest extends \Codeception\Test\Unit
{
	
    public function testSuccess()
    {
        $security = Security::create(
            $ip = '127.0.0.9',
            $count = 5
        );

        $this->assertEquals($ip, $security->ip);
        $this->assertEquals($count, $security->count);
    }
    
}