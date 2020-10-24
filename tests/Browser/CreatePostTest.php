<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreatePostTest extends DuskTestCase
{
    /**
     * Verifica Si No Hay Errores A La Hora De Crear Posts
     *
     * @return void
     */
    public function testCreatePost()
    {
        $user = User::factory()->create([
            'email' =>'test121@test.com',
            'password' => bcrypt('123456789')
        ]);
        $this->browse(function (Browser $browser) use($user) {
            $browser->visit('/login')
                    ->type('email' , $user->email)
                    ->type('password' , '123456789')
                    ->press('LOGIN')
                    ->visit('/posts')
                    ->press('Crear Nuevo Post')
                    ->type('title' , 'este es un titulo de prueba')
                    ->type('description' , 'descripcion de prueba')
                    ->type('date' , '14 de Octubre de 2020')
                    ->select('category' , 'Series')
                    ->press('Crear')
                    ->visit('/posts')
                    ->assertSee('este es un titulo de prueba');
        });
    }
}
