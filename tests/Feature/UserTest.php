<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class UserTest extends TestCase
{
    
    public function testUserCanViewAnyPost()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                         ->get(route('posts.index'));
        $response->assertStatus(200);
    }   

    public function testUserCanViewAnyCategory()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                         ->get(route('categories.index'));
        $response->assertStatus(200);
    }   
}
