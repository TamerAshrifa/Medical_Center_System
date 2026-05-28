<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class DoctorSpeciality extends Model
{
    use HasFactory;
    protected $guarded = [
        "id",
    ];

    protected function casts(): array
    {
        return [
            'experience_starting_date' => 'date',
            'view_experience_to_patients' => 'boolean',
        ];
    }
}
