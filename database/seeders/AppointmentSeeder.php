<?php

namespace Database\Seeders;

use App\Enums\AppointmentStatusEnum;
use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    /*
      for ($i = 1; $i <= 11; $i++) {
            $doctorWorkSchedule = WorkSchedule::create([
                'effective_from_date' => Carbon::today()->addDays($i + 1)->format('Y-m-d'),
                'type' => WorkScheduleTypeEnum::DOCTOR->value,
            ]);
            $k = 3;
            for ($j = 0; $j < 2; $j++)
                DayWorkTime::create([
                    'weekday_id' => $k++,
                    'work_schedule_id' => $doctorWorkSchedule->id,
                    'start_time' => '10:00',
                    'end_time' => '21:00',
                ]);
            DayWorkTime::create([
                'weekday_id' => ++$k,
                'work_schedule_id' => $doctorWorkSchedule->id,
                'start_time' => '11:00',
                'end_time' => '20:00',
            ]);
            DayWorkTime::create([
                'weekday_id' => ++$k,
                'work_schedule_id' => $doctorWorkSchedule->id,
                'start_time' => '09:00',
                'end_time' => '22:00',
            ]);

            MedicalCenterWorkSchedule::create([
                'doctor_id' => $i,
                'work_schedule_id' => $doctorWorkSchedule->id,
            ]);
        }
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
                'status' => $i <= 2 ?
                    AppointmentStatusEnum::ATTENDED->value :
                    AppointmentStatusEnum::PENDING->value,
            ]);
            $datetime = Carbon::parse($datetime)->addMinutes($appointmentDuration)->format('Y-m-d H:i');
        }
    }
}
