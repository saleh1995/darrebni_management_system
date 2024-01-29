<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Coach;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Coach::factory(10)->create();

        $this->call([
            CoachSeeder::class,
            SpecializetionSeeder::class,
            AmountSeeder::class,
            EmployeeSeeder::class,
            BrunchSeeder::class,
        ]);
    }
}


