<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Lama',
            'email' => 'lama@example.com',
            'password' => Hash::make('12345678'),
        ]);

        $this->call(CountrySeeder::class);
        $this->call(UpdateCountryDataSeeder::class);
        $this->call(EventSeeder::class);
    }
}
