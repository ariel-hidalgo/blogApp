<?php

namespace Tests\Unit;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Tests\TestCase;

class BlogTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCategoryHasUserAssigned()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create(['user_id' => $user->id]);
        $this->assertEquals($user->id , $category->user->id);
    }

    public function testPostHasUserAssigned()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $this->assertEquals($user->id , $post->user->id);
    }
}
