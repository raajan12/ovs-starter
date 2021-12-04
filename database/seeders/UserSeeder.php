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
        \App\Models\User::create([
            'name'          => 'Admin',
            'email'         => 'admin@admin.com',
            'password'      => bcrypt('password'),
            'role'          => 'Admin',
        ]);

        \App\Models\User::create([
            'name'          => 'User',
            'email'         => 'user@user.com',
            'password'      => bcrypt('password'),
            'role'          => 'User',
        ]);
    }
}
