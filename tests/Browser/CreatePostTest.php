<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreatePostTest extends DuskTestCase
{
    public function testCreateNewPost()
    {
        $user = User::factory()->create([
            'email' => 'lol10@lol10.com',
            'password' => bcrypt('olakeace'),
            'role' => 'manager'
            ]);
        $category = Category::factory()->create();
        $this->browse(function (Browser $browser) use($user, $category) {
            $browser->visit('/login')
                    ->type('email' , $user->email)
                    ->type('password' , 'olakeace')
                    ->press('LOGIN')
                    ->press('Crear Nuevo Post')
                    ->type('title' , 'post de prueba')
                    ->type('description' , 'descripcion de prueba')
                    ->select('category_id' , $category->id)
                    ->select('user_id' , $user->id)
                    ->press('Crear Post')
                    ->visit('/')
                    ->assertSee('post de prueba');
        });
    }
}
