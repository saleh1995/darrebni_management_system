<?php

namespace Database\Seeders;

use App\Models\TrainingBatch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TrainingBatchSeeder extends Seeder
{



    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrainingBatch::factory(100)->create();

    }
}
