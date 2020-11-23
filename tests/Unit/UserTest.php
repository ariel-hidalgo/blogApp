<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
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
