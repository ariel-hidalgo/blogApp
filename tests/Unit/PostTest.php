<?php

namespace Tests\Unit;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function testPostHasCategoryAssigned()
    {
        $category = Category::factory()->create();
        $post = Post::factory()->create(['category_id' => $category->id]);
        $this->assertEquals($category->id , $post->category->id);
    }

    public function testPostHasCreatorAssigned()
    {
        $creator = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $creator->id]);
        $this->assertEquals($creator->id , $post->user_id);
    }
}
