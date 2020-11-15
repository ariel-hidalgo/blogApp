<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterUserTest extends DuskTestCase
{
    /**
     * Verifica que el usuario pueda registrarse correctamente
     *
     * @return void
     */
    public function testCreatePost()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name' , 'Ariel Hidalgo')
                    ->type('email' , 'ariel@ariel.com')
                    ->type('password' , '12345678')
                    ->type('password_confirmation' , '12345678')
                    ->press('REGISTER')
                    ->assertSee('Dashboard');
        });
    }
}
