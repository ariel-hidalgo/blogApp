<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* \App\Models\User::create([
            'name' => 'Ariel Hidalgo',
            'email' => 'ariel@ariel.com',
            'password' => bcrypt('12345678'),
            'role' => 'user'
        ]); */

        \App\Models\User::create([
            'name' => 'The Manager',
            'email' => 'manager@manager.com',
            'password' => bcrypt('12345678'),
            'role' => 'manager'
        ]);
    }
}
