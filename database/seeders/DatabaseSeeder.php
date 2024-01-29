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
            SpecializetionSeeder::class,
            TraineeSeeder::class,
            UserSeeder::class,
            CourseSeeder::class,
            CoachSeeder::class,
            EmployeeSeeder::class,
            BrunchSeeder::class,
            TrainingBatchSeeder::class,
            AmountSeeder::class,

        ]);
    }
}
