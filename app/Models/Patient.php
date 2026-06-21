<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Patient extends Model
{
    use HasFactory;
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
    public function bloodType()
    {
        return $this->belongsTo(BloodType::class, 'blood_type_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function medicalRecordsAccesses()
    {
        return $this->hasMany(MedicalRecordAccess::class, 'patient_id');
    }
    public function complaints()
    {
        return $this->hasMany(PatientComplaint::class, 'patient_id');
    }

    public function transfers()
    {
        return $this->hasMany(Transfer::class, 'patient_id');
    }



}
