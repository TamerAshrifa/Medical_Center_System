<?php

namespace Database\Seeders;

use App\Models\BloodType;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    public static $blood_types = ['Not_Determined', 'O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-',];

    public function run(): void
    {
        foreach ($this::$blood_types as $blood_type)
            BloodType::create([
                'name' => $blood_type,
            ]);
    }
}
