<?php

namespace Database\Seeders;

use App\Models\Specializetion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializetionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specializetion::factory(10)->create();

    }
}
