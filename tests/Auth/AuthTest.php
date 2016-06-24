<?php

namespace Emiolo\User\Tests\Auth;

use Emiolo\User\Tests\AbstractTestCase;
use Emiolo\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Orchestra\Testbench\Traits\WithFactories;

class AuthTest extends AbstractTestCase
{

    use WithFactories;

    public function setUp()
    {
        parent::setUp();
        $this->migrate(); 
        $this->withFactories(__DIR__ . '/../../src/resources/factories');
        
   }

    public function test_check_if_user_is_not_authenticated()
    {
        $this->assertEquals(false, Auth::Check());
    }
    public function test_check_if_user_is_authenticated()
    {
        $user = factory(User::class)->create();
        Auth::Login($user);
        $this->assertEquals(true, Auth::Check());
    }
}
