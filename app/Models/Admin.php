<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $guarded = [
        "id",
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
            'is_active' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function addedByAdmin()
    {
        return $this->belongsTo(Admin::class, 'added_by_admin_id');
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
