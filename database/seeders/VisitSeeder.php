<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Visit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 2; $i++) {
            $appointment = Appointment::findOrFail($i);
            Visit::create([
                'appointment_id' => $appointment->id,
                'actual_time' => $appointment->datetime->format('H:i'),
                'medical_diagnosis' => "Diagnosis $i",
                'prescription' => "Prescription $i",
                'notes' => "Some notes $i",
                'notes_for_other_doctors' => "Notes For Other Doctors $i",
            ]);
        }
    }
}
