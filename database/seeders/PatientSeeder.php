<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{

    public function run(): void
    {
        for ($i = 16; $i <= 30; $i++)
            Patient::create([
                'user_id' => $i,
                'blood_type_id' => rand(1, 9),
                'allergies' => null,
                'chronic_diseases' => null,
            ]);

    }
}
