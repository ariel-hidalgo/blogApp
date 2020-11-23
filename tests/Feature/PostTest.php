<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;

class PostTest extends TestCase
{

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

    public function testAuthorizedUserCanEditPost()
    {
        $user = User::factory()->create(['role' => 'user']);
        $post = Post::factory()->create(['user_id' => $user->id]);
        $response = $this->actingAs($user)->get(
            'posts/' . $post->id . '/edit'
        );
        $response->assertStatus(200);
    }

    public function testAuthorizedUserCanDeletePost()
    {
        $user = User::factory()->create(['role' => 'user']);
        $post = Post::factory()->create(['user_id' => $user->id])->toArray();
        $this->actingAs($user)->get(
            route('posts.destroy' , $post['id'])
        );
        $this->assertDeleted('posts' , $post);
    }

// Manager Tests

    public function testManagerCanCreatePost()
    {
        $manager = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($manager)->get(
            route('posts.create')
        );
        $response->assertStatus(200);
    }

    public function testManagerCanStorePost()
    {
        $manager = User::factory()->create(['role' => 'manager']);
        $post = Post::factory()->make(['user_id' => $manager->id])->toArray();
        $response = $this->actingAs($manager)->post(
            route('posts.store') , $post
        );
        $response->assertRedirect();
        $this->assertDatabaseHas('posts' , $post);
    } 

}
