<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\StudentStatusEnum;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->name,
            'gender'        => $this->faker->boolean,
            'birth_date'    => $this->faker->dateTimeBetween('-30 years old','-18 years old')->format('Y-m-d'),
            'status'        => $this->faker->randomElement(StudentStatusEnum::asArray()),
            'course_id'     => Course::query()->inRandomOrder('id')->first()->id,
        ];
    }
}
