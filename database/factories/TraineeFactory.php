<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trainee>
 */
class TraineeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name_ar' => fake()->name(),
            'middle_name_ar' => fake()->name(),
            'last_name_ar' => fake()->name(),
            'first_name_en' => fake()->name(),
            'middle_name_en' => fake()->name(),
            'last_name_en' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'date' => fake()->dateTimeThisMonth(),
        ];
    }
}
