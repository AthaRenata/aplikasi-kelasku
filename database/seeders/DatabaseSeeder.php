<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'role' => 1,
            'name' => 'administrator',
            'password' => Hash::make('password'),
            'email' => 'admin@gmail.com',
        ]);

        School::create([
            'npsn' => '20328969',
            'name' => 'SMKN 9 Semarang',
        ]);

        School::create([
            'npsn' => '20328946',
            'name' => 'SMKN 3 Semarang',
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
