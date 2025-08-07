<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sawwah.com',
            'password' => Hash::make('Admin@123'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);
    }
}
