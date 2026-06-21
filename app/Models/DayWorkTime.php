<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DayWorkTime extends Model
{
    protected $guarded = [
        "id",
    ];

    protected function casts(): array
    {
        return [
            'start_time' => 'datetime:H:i',
            'end_time' => 'datetime:H:i',
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }


    public function weekDay()
    {
        return $this->belongsTo(WeekDay::class, 'weekday_id');
    }
    public function workSchedule()
    {
        return $this->belongsTo(WorkSchedule::class, 'work_schedule_id');
    }
}
