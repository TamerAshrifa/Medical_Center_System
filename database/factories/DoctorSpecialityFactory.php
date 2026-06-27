<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorSpecialityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'speciality_id' => rand(1, 36),
            'experience_starting_date' => fake()->date(),
            'view_experience' => fake()->boolean(),
        ];
    }
}
