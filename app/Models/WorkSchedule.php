<?php

namespace App\Models;

use App\Enums\WorkScheduleTypeEnum;
use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    protected $guarded = [
        "id",
    ];
    protected function casts(): array
    {
        return [
            'effective_from_date' => 'datetime:Y-m-d',
            'effective_to_date' => 'datetime:Y-m-d',
            'type' => WorkScheduleTypeEnum::class,
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
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
    public function medicalCenterWorkSchedule()
    {
        return $this->hasOne(MedicalCenterWorkSchedule::class, 'work_schedule_id');
    }

}
