<?php

namespace App\Http\Resources\Patient;

use App\Http\Resources\BloodType\BloodTypeToPatientResource;
use App\Http\Resources\User\UserToPatientResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientToItselfResource extends JsonResource
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
            'user' => new UserToPatientResource($this->user),
            'blood_type' => new BloodTypeToPatientResource($this->bloodType),
        ];
    }
}
