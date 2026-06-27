<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BloodTypeSeeder::class,
            PatientSeeder::class,
            AdminSeeder::class,
            RoomSeeder::class,
            DoctorSeeder::class,
            SpecialitiesSeeder::class,
            DoctorSpecialitySeeder::class,
            WeekDaySeeder::class,
            WorkScheduleSeeder::class,
            AppointmentSeeder::class,
            VisitSeeder::class,
            MedicalRecordAccessSeeder::class,
        ]);
    }
}
