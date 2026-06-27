<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{

    public function run(): void
    {
        Doctor::create([
            'user_id' => 2,
            'room_id' => 1,
            'added_by_admin_id' => 1,
            'appointment_duration' => 20,
        ]);

        for ($i = 8; $i <= 17; $i++) {
            Doctor::create([
                'user_id' => $i,
                'room_id' => $i - 7,
                'added_by_admin_id' => 1,
                'appointment_duration' => 15,
            ]);
            User::where('id', $i)->update([
                'role' => 'doctor'
            ]);
        }

    }
}
