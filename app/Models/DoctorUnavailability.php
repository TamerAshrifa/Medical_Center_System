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
            'from_date' => 'date:Y-m-d',
            'to_date' => 'date:Y-m-d',
        ];
    }

    public function reasonType()
    {
        return $this->belongsTo(DoctorUnavailabilityReasonType::class, 'reason_type_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }


}
