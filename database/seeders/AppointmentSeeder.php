<?php

namespace Database\Seeders;

use App\Enums\AppointmentStatusEnum;
use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointmentDuration = Doctor::where('id', 1)->valueOrFail('appointment_duration');
        $datetime = Carbon::today()->addDays(2)->format('Y-m-d') . ' 10:00';
        for ($i = 1; $i <= 5; $i++) {
            Appointment::create([
                'patient_id' => $i,
                'doctor_id' => 1,
                'datetime' => $datetime,
                'active_booking_key' => 1 . ' - ' . $datetime,
                'status' => $i <= 2 ?
                    AppointmentStatusEnum::ATTENDED->value :
                    AppointmentStatusEnum::PENDING->value,
            ]);
            $datetime = Carbon::parse($datetime)->addMinutes($appointmentDuration)->format('Y-m-d H:i');
        }
    }
}
