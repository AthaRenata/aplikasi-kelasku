<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\School;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

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
