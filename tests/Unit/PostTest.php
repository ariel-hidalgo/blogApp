<?php

namespace Tests\Unit;
use App\Models\Category;
use App\Models\Post;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function testPostHasCategoryAssigned()
    {
        $category = Category::factory()->create();
        $post = Post::factory()->create(['category_id' => $category->id]);
        $this->assertEquals($category->id , $post->category->id);
    }
}
