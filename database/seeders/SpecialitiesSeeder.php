<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitiesSeeder extends Seeder
{
    public function run(): void
    {
        $specialities = [
            'Cardiology',
            'Dermatology',
            'Endocrinology',
            'Gastroenterology',
            'General',
            'Family Medicine',
            'Internal Medicine',
            'Neurology',
            'Obstetrics and Gynecology',
            'Oncology',
            'Ophthalmology',
            'Otolaryngology',
            'Pediatrics',
            'Psychiatry',
            'Pulmonology',
            'Rheumatology',
            'Urology',
            'Emergency Medicine',
            'Anesthesiology',
            'Pathology',
            'Nephrology',
            'Neonatology',
            'Nuclear Medicine',
            'Physical Medicine and Rehabilitation',
            'Allergy and Immunology',
            'Pain Medicine',
            'Reproductive Endocrinology and Infertility',
            'Palliative Medicine',
            'Sleep Medicine',
            'Preventive Medicine',
            'Clinical Genetics',
            'Hepatology',
            'Diabetology',
            'Medical Oncology',
            'Pediatric Cardiology',
            'Pediatric Neurology',
        ];
        foreach ($specialities as $speciality)
            Speciality::create([
                'name' => $speciality,
                'added_by_admin_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

    }
}
