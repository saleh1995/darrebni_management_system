<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrainingBatch>
 */
class TrainingBatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $length = random_int(1, 6);
        $array = [];

        while (count($array) < $length) {
            $randomValue = random_int(0, 6);

            if (!in_array($randomValue, $array)) {
                $array[] = $randomValue;
            }
        }

        $courseIds = DB::table('courses')->pluck('id')->all();
        $coachIds = DB::table('coaches')->pluck('id')->all();
        $bruncheIds = DB::table('brunches')->pluck('id')->all();
        return [
                'name' => 'Batch'. random_int(1, 10),
                'TrainingBatchID' => 'TP' . random_int(1, 100),
                'price' => random_int(1000, 100000),
                'currency' => 'USD',
                'days' => json_encode($array, true),
                'coach_id' => $courseIds[array_rand($coachIds)],
                'course_id' => $courseIds[array_rand($courseIds)],
                'brunch_id' => $courseIds[array_rand($bruncheIds)],
        ];
    }
}
