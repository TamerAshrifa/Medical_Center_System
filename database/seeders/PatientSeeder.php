<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{

    public function run(): void
    {
        Patient::create([
            'user_id' => 3,
            'blood_type_id' => 2,
            'allergies' => null,
            'chronic_diseases' => null,
        ]);

        $maxBloodTypeId = count(BloodTypeSeeder::$blood_types);

        for ($i = 18; $i <= 27; $i++) {
            Patient::create([
                'user_id' => $i,
                'blood_type_id' => rand(1, $maxBloodTypeId),
                'allergies' => null,
                'chronic_diseases' => null,
            ]);

            User::where('id', $i)->update([
                'role' => 'patient'
            ]);
        }
    }
}
