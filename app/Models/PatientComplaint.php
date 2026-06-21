<?php

namespace App\Models;

use App\Enums\PatientComplaintStatusEnum;
use Illuminate\Database\Eloquent\Model;

class PatientComplaint extends Model
{
    protected $guarded = [
        "id",
    ];
    protected function casts(): array
    {
        return [
            'status' => PatientComplaintStatusEnum::class,
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }


    public function reviewedByAdmin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }



}
