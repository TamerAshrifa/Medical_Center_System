<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function addedByAdmin()
    {
        return $this->belongsTo(Admin::class, 'added_by_admin_id');
    }

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class, 'doctor_specialities');
    }

    public function doctorSpecialities()
    {
        return $this->hasMany(DoctorSpeciality::class, 'doctor_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }
    public function unavailabilities()
    {
        return $this->hasMany(DoctorUnavailability::class, 'doctor_id');
    }
    public function doctorWorkSchedules()
    {
        return $this->hasMany(DoctorWorkSchedule::class, 'doctor_id');
    }

    public function accessedMedicalRecords()
    {
        return $this->hasMany(MedicalRecordAccess::class, 'can_accessed_by_doctor_id');
    }

    public function referedTransfers()
    {
        return $this->hasMany(Transfer::class, 'referring_doctor_id');
    }
    public function receivedTransfers()
    {
        return $this->hasMany(Transfer::class, 'receiving_doctor_id');
    }
}
