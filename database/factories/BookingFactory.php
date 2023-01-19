<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;

/**
 * @extends Factory
 */
class BookingFactory extends Factory
{
    use WithFaker;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'activity_id'     => Activity::factory(),
            'completion_date' => function (array $attributes) {
                $activity = Activity::find($attributes['activity_id'], ['id', 'start_date', 'end_date']);

                return $this->faker->dateTimeBetween($activity->start_date, $activity->end_date);
            },
            'quantity_people' => $this->faker->numberBetween(1, 20),
            'created_at'      => function (array $attributes) {
                return Carbon::create($attributes['completion_date'])->subDays(rand(1, 10));
            },
        ];
    }
}
