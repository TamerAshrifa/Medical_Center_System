<?php

namespace Database\Seeders;

use App\Enums\WorkScheduleTypeEnum;
use App\Models\DayWorkTime;
use App\Models\DoctorWorkSchedule;
use App\Models\MedicalCenterWorkSchedule;
use App\Models\WorkSchedule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WorkScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicalCenterWorkSchedule = WorkSchedule::create([
            'effective_from_date' => Carbon::today()->addDay()->format('Y-m-d'),
            'type' => WorkScheduleTypeEnum::MEDICAL_CENTER->value,
        ]);

        $j = 3;
        for ($i = 0; $i < 3; $i++)
            DayWorkTime::create([
                'weekday_id' => $j++,
                'work_schedule_id' => $medicalCenterWorkSchedule->id,
                'start_time' => '09:00',
                'end_time' => '22:00',
            ]);
        DayWorkTime::create([
            'weekday_id' => $j++,
            'work_schedule_id' => $medicalCenterWorkSchedule->id,
            'start_time' => '10:00',
            'end_time' => '21:00',
        ]);
        DayWorkTime::create([
            'weekday_id' => $j++,
            'work_schedule_id' => $medicalCenterWorkSchedule->id,
            'start_time' => '08:00',
            'end_time' => '23:00',
        ]);
        MedicalCenterWorkSchedule::create([
            'work_schedule_id' => $medicalCenterWorkSchedule->id,
            'made_by_admin_id' => 1,
        ]);

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

            DoctorWorkSchedule::create([
                'doctor_id' => $i,
                'work_schedule_id' => $doctorWorkSchedule->id,
            ]);
        }
    }
}
