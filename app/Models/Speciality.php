<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $guarded = [
        "id",
    ];

    public function addedByAdmin()
    {
        return $this->belongsTo(Admin::class, 'added_by_admin_id');
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_specialities');
    }
}
