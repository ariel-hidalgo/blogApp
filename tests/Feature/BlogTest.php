<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\User;

class BlogTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGuestCanNotCreatePost()
    {
        $response = $this->get(route('posts.create'));
        $response->assertStatus(403);
    }   

    public function testManagerCanCreatePost()
    {
        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)->get(
            route('posts.create')
        );
        $response->assertStatus(200);
    }
}
