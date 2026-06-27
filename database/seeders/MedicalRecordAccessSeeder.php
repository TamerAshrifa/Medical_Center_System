<?php

namespace Database\Seeders;

use App\Models\MedicalRecordAccess;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalRecordAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            MedicalRecordAccess::create([
                'visit_id' => 1,
                'patient_id' => 1,
                'can_accessed_by_doctor_id' => $i,
                'is_active' => true,
            ]);
            MedicalRecordAccess::create([
                'visit_id' => 2,
                'patient_id' => 2,
                'can_accessed_by_doctor_id' => $i,
                'is_active' => true,
            ]);
        }
    }
}
