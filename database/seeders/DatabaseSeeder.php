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
            TrainingBatchSeeder::class,
            AmountSeeder::class,
            EmployeeSeeder::class,
            BrunchSeeder::class,
<<<<<<< HEAD
            EmployeeSeeder::class,
            BrunchSeeder::class,
=======

>>>>>>> dc3ee183e719d12d2b6a18e944c2b98710e743c9
        ]);
    }
}
