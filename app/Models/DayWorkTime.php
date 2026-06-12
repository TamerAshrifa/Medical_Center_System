<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DayWorkTime extends Model
{
    protected $guarded = [
        "id",
    ];

    public function weekDay()
    {
        return $this->belongsTo(WeekDay::class, 'weekday_id');
    }
    public function workSchedule()
    {
        return $this->belongsTo(WorkSchedule::class, 'work_schedule_id');
    }
}
