<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 11,
            'location' => $this->faker->randomElement(['Harrogate', 'Sheffield', 'Leeds']),
            'people' => $this->faker->numberBetween(1, 8),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),

        ];
    }
}
