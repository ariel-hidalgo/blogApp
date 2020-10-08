<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anime = Category::where('name_category' , 'Películas')->first();

        $post = Post::create([
            'title' => 'test2',
            'description' => 'test2desc',
            'date' => 'test2date',

        ]);

        $post->category()->associate($anime)->save();
    }
}
