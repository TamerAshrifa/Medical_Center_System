<?php

namespace Database\Seeders;

use App\Models\BloodType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    public function run(): void
    {
        $blood_types = ['Not_Determined', 'O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-',];
        foreach ($blood_types as $blood_type)
            BloodType::create([
                'name' => $blood_type,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
