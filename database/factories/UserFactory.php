<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'  => $this->faker->name,
            'avatar'=> $this->faker->imageUrl(),
            'level' => $this->faker->boolean,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->password(),
            'created_at' => now(),
        ];
    }
}
