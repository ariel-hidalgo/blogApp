<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class PostTest extends TestCase
{

    public function testGuestCanNotCreatePost()
    {
        $response = $this->get(route('posts.create'));
        $response->assertStatus(302);
    }   


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

    public function testPostDestroy()
    {
        $user = User::factory()->create(['role' => 'user']);
        $category = Category::factory()->create();
        $post = Post::factory()->create([
            'title' => 'prueba',
            'category_id' => $category->id,
            'user_id' => $user->id
            ]);
        $response = $this->actingAs($user)->delete('posts/' . $category->id);
        $response->assertDontSee('prueba');
    }

}
