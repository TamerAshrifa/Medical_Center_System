<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalCenterWorkSchedule extends Model
{
    protected $guarded = [
        "id",
    ];
    public function workSchedule()
    {
        return $this->belongsTo(WorkSchedule::class, 'work_schedule_id');
    }

    public function madeByAdmin()
    {
        return $this->belongsTo(Admin::class, 'made_by_admin_id');
    }

}
