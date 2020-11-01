<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * Verifica Si Un Usuario Puede Logearse
     *
     * @return void
     */
    public function testLogin()
    {
        $user = User::factory()->create([
            'email' =>'test8874@test.com',
            'password' => bcrypt('123456789')
        ]);

        $this->browse(function (Browser $browser) use($user) {
            $browser->visit('/login')
                    ->type('email' , $user->email)
                    ->type('password' , '123456789')
                    ->press('LOGIN')
                    ->assertSee('Dashboard');
        });
    } 
}
