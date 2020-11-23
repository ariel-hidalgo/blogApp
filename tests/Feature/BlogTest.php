<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class BlogTest extends TestCase
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

    public function testManagerCanCreatePost()
    {
        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)->get(
            route('posts.create')
        );
        $response->assertStatus(200);
    }
}
