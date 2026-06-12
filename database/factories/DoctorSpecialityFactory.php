<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorSpecialityFactory extends Factory
{
    // protected static int $doctorId = 1;

    public function definition(): array
    {
        // if (static::$doctorId > 10)
        //     static::$doctorId = 1;

        return [
            // 'doctor_id' => static::$doctorId++,
            'speciality_id' => rand(1, 36),
            'experience_starting_date' => fake()->date(),
            'view_experience' => fake()->boolean(),
        ];
    }
}
