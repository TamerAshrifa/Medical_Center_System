<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $guarded = [
        "id",
    ];
    public function referringDoctor()
    {
        return $this->belongsTo(Doctor::class, 'referring_doctor_id');
    }
    public function receivingDoctor()
    {
        return $this->belongsTo(Doctor::class, 'receiving_doctor_id');
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function appointement()
    {
        return $this->belongsTo(Appointment::class, 'appointement_id');
    }


}
