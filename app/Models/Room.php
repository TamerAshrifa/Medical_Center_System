<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [
        "id",
    ];

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'room_id');
    }

    public function lastUpdateByAdmin()
    {
        return $this->belongsTo(Admin::class, 'last_update_by_admin_id');
    }
}
