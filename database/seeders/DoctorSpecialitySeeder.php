<?php

namespace Database\Seeders;

use App\Models\DoctorSpeciality;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class DoctorSpecialitySeeder extends Seeder
{
    use HasFactory;
    public function run(): void
    {
        for ($i = 0; $i <= 35; $i++)
            DoctorSpeciality::factory()->create([
                'doctor_id' => $i % 10 + 1,
            ]);
    }
}
