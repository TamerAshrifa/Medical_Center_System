<?php

namespace Database\Seeders;

use App\Models\DoctorSpeciality;
use Illuminate\Database\Seeder;

class DoctorSpecialitySeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i <= 35; $i++) {
            $doctorId = $i % 11 + 1;
            $specialityId = ($i % 36) + 1;

            DoctorSpeciality::firstOrCreate(
                [
                    'doctor_id' => $doctorId,
                    'speciality_id' => $specialityId,
                ],
                [
                    'experience_starting_date' => now()->subYears(rand(1, 10))->toDateString(),
                    'view_experience' => fake()->boolean(),
                ]
            );
        }
    }
}
