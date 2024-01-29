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
        $this->call([
            UserSeeder::class,
            CourseSeeder::class,
            SpecializetionSeeder::class,
            BrunchSeeder::class,
            CoachSeeder::class,
            TraineeSeeder::class,
            EmployeeSeeder::class,
            TrainingBatchSeeder::class,
            AmountSeeder::class,
        ]);
    }
}
