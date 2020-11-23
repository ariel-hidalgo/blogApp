<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGuestCanNotCreatePost()
    {
        $response = $this->get(route('posts.create'));
        $response->assertStatus(302);
    }   

// User Tests

    public function testUserCanViewAllPosts()
{
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->actingAs($user)->get(
            route('posts.index')
        );
        $response->assertStatus(200);
}

    public function testUserCanNotCreatePost()
    {
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->actingAs($user)->get(
            route('posts.create')
        );
        $response->assertStatus(403);
    }

// Manager Tests

    public function testManagerCanCreatePost()
    {
        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)->get(
            route('posts.create')
        );
        $response->assertStatus(200);
    }

    public function testManagerCanStorePost()
    {
        $manager = User::factory()->create(['role' => 'manager']);
        $user = User::factory()->create(['role' => 'user']);
        $post = Post::factory()->make(['user_id' => $user->id])->toArray();
        $response = $this->actingAs($manager)->post(
            route('posts.store') , $post
        );
        $response->assertRedirect();
    } 
}
