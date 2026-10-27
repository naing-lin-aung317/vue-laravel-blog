<?php

namespace Database\Factories;

use App\Models\Nrc;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Nrc>
 */
class NrcFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'township' => fake()->city(),
            'number' => fake()->numerify('######'),
        ];
    }
}
