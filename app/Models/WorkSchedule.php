<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    protected $guarded = [
        "id",
    ];
    protected function casts(): array
    {
        return [
            'effective_from_date' => 'date',
            'effective_to_date' => 'date',
        ];
    }
    public function dayWorkTimes()
    {
        return $this->hasMany(DayWorkTime::class, 'work_schedule_id');
    }
    public function doctorWorkSchedule()
    {
        return $this->hasOne(DoctorWorkSchedule::class, 'work_schedule_id');
    }
    public function centerWorkSchedule()
    {
        return $this->hasOne(MedicalCenterWorkSchedule::class, 'work_schedule_id');
    }


}
