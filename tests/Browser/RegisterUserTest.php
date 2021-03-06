<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterUserTest extends DuskTestCase
{
    public function testRegisterUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name' , 'Browser Test')
                    ->type('email' , 'brow@test.com')
                    ->type('password' , '12345678')
                    ->type('password_confirmation' , '12345678')
                    ->press('REGISTER')
                    ->assertSee('Usuario');
        });
    }
}
