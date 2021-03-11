<?php

namespace Database\Seeders;

use Core\Models\User;
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
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'role' => 'superAdmin',
        ]);

        User::create([
            'name' => 'manager',
            'email' => 'manager@admin.com',
            'password' => bcrypt('123456'),
            'role' => 'manager',
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
