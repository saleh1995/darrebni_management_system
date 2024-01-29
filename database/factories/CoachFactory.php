<?php

namespace Database\Factories;

use App\Models\Coach;
use Database\Seeders\CoachSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coach>
 */
class CoachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return[
                'first_name'=>fake()->name(),
                'middle_name'=>fake()->name(),
                'last_name'=>fake()->name(),
                'phone'=>fake()->phoneNumber(),
                'address'=>fake()->address(),
                'email'=>fake()->email(),
                'birth_date'=>fake()->date(),
                'image'=>'images/YEvg1gIMAmC4AZ9OZcjXNwkoff2vY9hyE6R22sS4.jpg',
                'notes'=>fake()->text(),
                'salary_sp'=>fake()->randomDigit(),
                'salary_us'=>fake()->randomDigit(),
                'specializetion_id'=>fake()->numberBetween(1,10),
                'CoachID'=>'sp00',

        ];
    }
}
