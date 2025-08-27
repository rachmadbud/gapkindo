<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // make super user
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        // assign super user role
        $user->assignRole('admin');
    }
}
