<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class BlogApiTest extends TestCase
{

    public function test_user_can_read_assigned_posts()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create(
            [
                "user_id" => (string)$user->id
            ]
        );

        Sanctum::actingAs(
            $user,
            [
                'view-posts'
            ]
        );

        $response = $this->getJson('/api/posts');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonFragment([
            'user_id' => (string)$user->id
        ]);
    }

    public function test_user_cant_read_unassigned_posts()
    {
        $postUser = User::factory()->create();

        $post = Post::factory()->create(
            [
                "user_id" => (string)$postUser->id
            ]
        );

        $apiUser = User::factory()->create();
        Sanctum::actingAs(
            $apiUser,
            [
                'view-posts'
            ]
        );

        $response = $this->getJson('/api/posts');

        $response->assertStatus(200);
        $response->assertJsonCount(0);
    }
}
