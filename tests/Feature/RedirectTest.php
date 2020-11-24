<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class RedirectTest extends TestCase
{
    
    public function testPostRedirectIfNotLoggedIn()
    {
        $response = $this->get(route('posts.index'));
        $response->assertRedirect('login');
    }   

    public function testCategoryRedirectIfNotLoggedIn()
    {
        $response = $this->get(route('categories.index'));
        $response->assertRedirect('login');
    }   
}
