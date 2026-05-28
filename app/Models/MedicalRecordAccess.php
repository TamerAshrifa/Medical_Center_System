<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecordAccess extends Model
{
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function visit()
    {
        return $this->belongsTo(Visit::class, 'visit_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'can_accessed_by_doctor_id');
    }


}
