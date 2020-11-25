<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Category; 

class CategoryTest extends TestCase
{

    public function testGuestCanNotCreateCategory()
    {
        $response = $this->get(route('categories.create'));
        $response->assertStatus(302);
    }   

    public function testUserCanViewAllCategories()
{
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->actingAs($user)->get(
            route('categories.index')
        );
        $response->assertStatus(200);
}

    public function testUserCanNotCreateCategory()
    {
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->actingAs($user)->get(
            route('categories.create')
        );
        $response->assertStatus(403);
    }

    public function testAuthorizedUserCanEditCategory()
    {
        $user = User::factory()->create(['role' => 'user']);
        $category = Category::factory()->create(['user_id' => $user->id]);
        $response = $this->actingAs($user)->get(
            'categories/' . $category->id . '/edit'
        );
        $response->assertStatus(200);
    }

    public function testAuthorizedUserCanDeleteCategory()
    {
        $user = User::factory()->create(['role' => 'user']);
        $category = Category::factory()->create(['user_id' => $user->id])->toArray();
        $this->actingAs($user)->get(
            route('categories.destroy' , $category['id'])
        );
        $this->assertDeleted('categories' , $category);
    }

    public function testManagerCanCreateCategory()
    {
        $manager = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($manager)->get(
            route('categories.create')
        );
        $response->assertStatus(200);
    }

    public function testManagerCanStoreCategory()
    {
        $manager = User::factory()->create(['role' => 'manager']);
        $category = Category::factory()->make(['user_id' => $manager->id])->toArray();
        $response = $this->actingAs($manager)->post(
            route('categories.store') , $category
        );
        $response->assertRedirect();
        $this->assertDatabaseHas('categories' , $category);
    } 

    public function testCategoryDestroy()
    {
        $user = User::factory()->create(['role' => 'user']);
        $category = Category::factory()->create([
            'name_category' => 'prueba',
            'user_id' => $user->id
            ]);
        $response = $this->actingAs($user)->delete('categories/' . $category->id);
        $response->assertDontSee('prueba');
    }

}
