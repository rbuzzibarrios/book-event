<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * @extends Factory
 */
class ActivityFactory extends Factory
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
            'title'       => $this->faker->text(rand(20, 64)),
            'description' => $this->faker->realText(),
            'price'       => $this->faker->randomFloat(2, 1, 500),
            'start_date'  => $this->faker->dateTimeBetween('-2 days', '+5 days'),
            'end_date'    => $this->faker->dateTimeBetween('+7 days', '+20 days'),
            'rating'      => $this->faker->numberBetween(0, 5),
        ];
    }
}
