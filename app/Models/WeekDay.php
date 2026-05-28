<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeekDay extends Model
{
    protected $guarded = [
        "id",
    ];

    public function dayWorkTimes()
    {
        return $this->hasMany(DayWorkTime::class, 'weekday_id');
    }



}
