<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Amount>
 */
class AmountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $traineeIds = DB::table('trainees')->pluck('id')->all();
        $trainingbatchesIds = DB::table('training_batches')->pluck('id')->all();
        return [
            'trainee_id'=> $traineeIds[array_rand($traineeIds)], //fake()->numberBetween(1,10),
            'training_batche_id'=>$trainingbatchesIds[array_rand($trainingbatchesIds)], //fake()->numberBetween(1,10),
            'amount'=>fake()->randomDigit(),
        ];
    }
}
