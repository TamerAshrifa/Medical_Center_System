<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [
        "id",
    ];
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'room_id');
    }

    public function lastUpdateByAdmin()
    {
        return $this->belongsTo(Admin::class, 'last_update_by_admin_id');
    }
}
