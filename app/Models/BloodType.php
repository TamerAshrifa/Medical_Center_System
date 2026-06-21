<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $guarded = [
        "id",
    ];
    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }

    public function patients()
    {
        return $this->hasMany(Patient::class, 'blood_type_id');
    }
}
