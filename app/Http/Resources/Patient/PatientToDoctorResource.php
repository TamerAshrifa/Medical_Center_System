<?php

namespace App\Http\Resources\Patient;

use App\Http\Resources\BloodType\BloodTypeToDoctorResource;
use App\Http\Resources\User\UserToDoctorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientToDoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'allergies' => $this->allergies,
            'chronic_diseases' => $this->chronic_diseases,
            'user' => new UserToDoctorResource($this->user),
            'blood_type' => new BloodTypeToDoctorResource($this->bloodType),
        ];
    }
}
