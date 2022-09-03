<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contest>
 */
class ContestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'                  => fake()->name(),
            'last_name'             => fake()->lastName(),
            'email'                 => fake()->safeEmail(),
            'phone'                 => $this->faker->e164PhoneNumber(),
            'identification_number' => $this->faker->unique()->randomNumber($nbDigits = 9, $strict = true),
        ];
    }
}
