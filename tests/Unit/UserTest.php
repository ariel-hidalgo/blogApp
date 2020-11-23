<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Testing the diferent posible roles of the User
     *
     * @return void
     */
    public function testUserIsManager()
    {
        $user = User::factory()->create(['role' => 'manager']);
        $userIsManager = $user->isManager();
        $this->assertTrue($userIsManager);
    }

    public function testUserIsNotManager()
    {
        $user = User::factory()->create(['role' => 'user']);
        $userIsManager = $user->isManager();
        $this->assertFalse($userIsManager);
    }

}
