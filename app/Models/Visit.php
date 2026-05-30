<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $guarded = [
        "id",
    ];
    protected function casts(): array
    {
        return [
            'actual_time' => 'datetime',
        ];
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }

    public function medicalRecordAccesses()
    {
        return $this->hasMany(MedicalRecordAccess::class, 'visit_id');
    }


}
