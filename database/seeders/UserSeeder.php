<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Ariel Hidalgo',
            'email' => 'ariel@ariel.com',
            'password' => bcrypt('12345678'),
            'role' => 'user'
        ]);

        User::create([
            'name' => 'The Manager',
            'email' => 'manager@manager.com',
            'password' => bcrypt('12345678'),
            'role' => 'manager'
        ]);
    }
}
