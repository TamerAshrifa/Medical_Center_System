<?php

namespace App\Models;

use App\Enums\En_AppointmentStatus;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = [
        "id",
    ];

    protected function casts(): array
    {
        return [
            'datetime' => 'datetime',
            'status' => En_AppointmentStatus::class,
        ];
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function transfer()
    {
        return $this->hasOne(Transfer::class, 'appointment_id');
    }

}
