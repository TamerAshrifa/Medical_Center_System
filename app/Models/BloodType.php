<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $guarded = [
        "id",
    ];
    public $timestamps = false;

    public function patients()
    {
        return $this->hasMany(Patient::class, 'blood_type_id');
    }
}
