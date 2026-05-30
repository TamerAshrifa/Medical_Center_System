<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorWorkSchedule extends Model
{
    protected $guarded = [
        "id",
    ];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function workSchedule()
    {
        return $this->belongsTo(WorkSchedule::class, 'work_schedule_id');
    }
}
