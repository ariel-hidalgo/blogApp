<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{

    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testLogin()
    {
    $user = factory(User::class)->create([
    'email' => 'tests@laravel.com' , 
    'password' => bcrypt('12345678')]);

        $this->browse(function (Browser $browser) use($user) {
            $browser->visit('/login')
                    ->type('email' , $user->email)
                    ->type('password' , '12345678')
                    ->press('Login')    
                    ->assertSee('Dashboard');
        });
    }
}
