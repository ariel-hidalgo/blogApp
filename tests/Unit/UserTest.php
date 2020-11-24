<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Tests\TestCase;

class UserTest extends TestCase
{
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

    public function testUserHasCategoryAssigned()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create(['user_id' => $user->id]);
        $this->assertEquals($user->id , $category->user->id);
    }

    public function testUserHasPostAssigned()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $this->assertEquals($user->id , $post->user->id);
    }

}
