<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $guarded = [
        "id",
    ];
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
    public function addedByAdmin()
    {
        return $this->belongsTo(Admin::class, 'added_by_admin_id');
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_specialities');
    }

    public function doctorSpecialities()
    {
        return $this->hasMany(DoctorSpeciality::class, 'speciality_id');
    }
}
