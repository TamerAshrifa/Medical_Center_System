<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{

    public function run(): void
    {
        for ($i = 16; $i <= 25; $i++) {
            Patient::create([
                'user_id' => $i,
                'blood_type_id' => rand(1, 9),
                'allergies' => null,
                'chronic_diseases' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $user = User::find($i);
            $user->role = UserRoleEnum::PATIENT;
            $user->save();
        }
    }
}
