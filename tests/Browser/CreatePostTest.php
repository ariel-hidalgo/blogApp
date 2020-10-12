<?php

namespace Tests\Browser;

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
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email' , 'arielhidalgo808@gmail.com')
                    ->type('password' , '12345678')
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
