<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateCategoryTest extends DuskTestCase
{
    public function testCreateCategory()
    {
        $user = User::factory()->create([
            'email' => 'lolololo@lolololo.com',
            'password' => bcrypt('olakeace'),
            'role' => 'manager'
            ]);
        

        $this->browse(function (Browser $browser) use($user) {
            $browser->visit('/login')
                    ->type('email' , $user->email)
                    ->type('password' , 'olakeace')
                    ->press('LOGIN')
                    ->visit('/categories')
                    ->press('Crear Nueva Categoría')
                    ->type('name_category' , 'Categoria Creada Para Testear')
                    ->select('user_id' , $user->id)
                    ->press('Crear Categoría')
                    ->visit('/categories')
                    ->assertSee('Categoria Creada Para Testear');
        });
    }
}
