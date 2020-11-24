<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdatePostTest extends DuskTestCase
{
    public function testUpdatePost()
    {
        $user = User::factory() ->create([
            'email'=> 'laravel2@laravel2.com',
            'password' => bcrypt('12345678'),
            'role' => 'manager'
        ]);
        $post = Post::factory() ->create([
            'title' => 'Post De Testing',
            'user_id' => $user->id
        ]);

       $this->browse(function (Browser $browser) use ($user ,$post) {
        $browser->visit('/login')
              ->type('email',$user->email)
              ->type('password','12345678')
              ->press('LOGIN')
              ->visit('posts')
                 ->assertSee($post->title)
                 ->press('Editar')
                 ->type('title', 'Post Editado')
                 ->select('user_id', $user->id)
                 ->press('Editar Post')
                 ->assertSee('Post Actualizado!');
        });
    }
}
