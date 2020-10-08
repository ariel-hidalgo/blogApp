<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name_category' => 'Películas',
            'color_category' => '#ff0800'
        ]);

        Category::create([
            'name_category' => 'Música',
            'color_category' => '#ff0800'
        ]);
    }
}
