<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $guarded = [
        "id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function updatedRooms()
    {
        return $this->hasMany(Room::class, 'last_update_by_admin_id');
    }

    public function addedSpecialities()
    {
        return $this->hasMany(Speciality::class, 'added_by_admin_id');
    }

    public function addedDoctors()
    {
        return $this->hasMany(Doctor::class, 'added_by_admin_id');
    }

    public function addedMedicalCenterWorkSchedules()
    {
        return $this->hasMany(MedicalCenterWorkSchedule::class, 'made_by_admin_id');
    }


    public function patientComplaintsReviews()
    {
        return $this->hasMany(PatientComplaint::class, 'admin_id');
    }
}
