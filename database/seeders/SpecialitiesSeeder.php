<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Seeder;

class SpecialitiesSeeder extends Seeder
{
    public static $specialities = [
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
    public function run(): void
    {
        foreach ($this::$specialities as $speciality)
            Speciality::create([
                'name' => $speciality,
                'added_by_admin_id' => 1,
            ]);

    }
}
