<?php

namespace App\Models;

use App\Enums\En_PatientComplaintStatus;
use Illuminate\Database\Eloquent\Model;

class PatientComplaint extends Model
{
    protected function casts(): array
    {
        return [
            'status' => En_PatientComplaintStatus::class,
        ];
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }


    public function reviewedByAdmin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }



}
