<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorUnavailability extends Model
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
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function unavailability()
    {
        return $this->belongsTo(Unavailability::class, 'unavailability_id');
    }

}
