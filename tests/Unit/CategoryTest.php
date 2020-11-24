<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function testCategoryHasPostAssigned()
    {
        $category = Category::factory()->create();
        $post = Post::factory()->create(['category_id' => $category->id]);
        $this->assertEquals($category->id , $post->category->id);
    }

    public function testCategoryHasCreatorAssigned()
    {
        $creator = User::factory()->create();
        $category = Category::factory()->create(['user_id' => $creator->id]);
        $this->assertEquals($creator->id , $category->user_id);
    }

    public function testCategoryCanHaveManyPosts()
    {
        $category = Category::factory()->has(Post::factory()->count(3))->create();
        $posts = $category->posts()->get();
        $this->assertNotEmpty($posts);
    }

}
