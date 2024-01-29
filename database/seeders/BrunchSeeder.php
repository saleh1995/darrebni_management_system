<?php

namespace Database\Seeders;
use App\Models\Brunch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrunchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brunch::factory(10)->create();

    }
}
