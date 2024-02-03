<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        $specializetionIds = DB::table('specializetions')->pluck('id')->all();
        $bruncheIds = DB::table('brunches')->pluck('id')->all();
        return [
        'darrebni_id'=>fake()->numberBetween(1,10),
        'first_name'=>fake()->name(),
        'middle_name'=>fake()->name(),
        'last_name'=>fake()->name(),
        'birth_date'=>fake()->date(),
        'email'=>fake()->email(),
        'phone'=>fake()->phoneNumber(),
        'address'=>fake()->address(),
        'image'=>'images/YEvg1gIMAmC4AZ9OZcjXNwkoff2vY9hyE6R22sS4.jpg',
        'salary'=>fake()->randomDigit(),
        'specializetion_id'=>$specializetionIds[array_rand($specializetionIds)],
        'brunch_id'=>$bruncheIds[array_rand($bruncheIds)],
        'note'=>fake()->text(),
        ];
    }
}
