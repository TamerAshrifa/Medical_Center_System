<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{

    public function run(): void
    {
        for ($i = 6; $i <= 15; $i++) {
            Doctor::create([
                'user_id' => $i,
                'room_id' => $i - 5,
                'added_by_admin_id' => 1,
                'appointment_duration' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            User::where('id', $i)->update([
                'role' => 'doctor'
            ]);
        }

    }
}
