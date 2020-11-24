<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdateCategoryTest extends DuskTestCase
{
    public function testUpdateCategory()
    {
        $user =User::factory() ->create([
            'email'=> 'laravel@laravel.com',
            'password' => bcrypt('12345678'),
            'role' => 'manager'
        ]);
        $category= Category::factory() ->create([
            'name_category' => 'Categoria De Testing',
            'user_id' => $user->id
        ]);

       $this->browse(function (Browser $browser) use ($user ,$category) {
        $browser->visit('/login')
              ->type('email',$user->email)
              ->type('password','12345678')
              ->press('LOGIN')
              ->visit('categories')
                 ->assertSee($category->name_category)
                 ->press('Editar')
                 ->type('name_category', 'Categoria Editada')
                 ->select('user_id', $user->id)
                 ->press('Editar Categoría')
                 ->assertSee('Categoría Actualizada!');
        });
    }
}
