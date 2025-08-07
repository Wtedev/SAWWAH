<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // إضافة المستخدم الأدمن
        $this->call(UserSeeder::class);

        // إضافة البيانات الأخرى
        $this->call(CountrySeeder::class);
        $this->call(EventSeeder::class);
    }
}
