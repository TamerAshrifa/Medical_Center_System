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
            'experience_starting_date' => 'datetime:Y-m-d',
            'view_experience' => 'boolean',
        ];
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }

}
