<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@shorten.com',
                'password' => bcrypt('secret123'),
                'user_type' => UserType::SUPER_ADMIN->value,
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@shorten.com',
                'password' => bcrypt('secret123'),
                'user_type' => UserType::ADMIN->value,
            ],
        ];

        collect($users)->each(function ($user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'user_type' => $user['user_type'],
                'email_verified_at' => now(),
            ]);
        });

        User::factory(10)->create();
    }
}
