<?php

namespace Database\Factories;

use App\Models\Farm;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TurbineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['stream', 'gas', 'contra', 'transonic', 'ceramic']),
            'farm_id' => Farm::inRandomOrder()->first()->id,
            'grade' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude
        ];
    }


}
