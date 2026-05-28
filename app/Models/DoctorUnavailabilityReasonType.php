<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorUnavailabilityReasonType extends Model
{
    public function reasonType()
    {
        return $this->hasMany(DoctorUnavailability::class, 'reason_type_id');
    }

}
