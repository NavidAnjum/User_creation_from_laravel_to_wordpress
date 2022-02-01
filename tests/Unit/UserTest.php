<?php

namespace Tests\Unit;

use App\Http\Controllers\CustomersController;
use App\Models\customers;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function testCreateUser()
    {
        $name = 'testname';
         $phone = 'testphone';
         $email = 'nav@gmail.com';

        if (empty($name) && empty($phone)  && empty($email) )
                {
                    $this->assertTrue(false);

                }else if(gettype($name)=="string"  && gettype($phone)=="string"  && gettype($email)=="string")
        {
            $this->assertTrue(true);

        }
    }

}
