<?php

namespace App\Http\Resources\Patient;

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
            'user_id' => $this->user_id,
            'user_fullname' => $this->user->first_name . ' ' . $this->user->last_name,
            'blood_type_id' => $this->blood_type_id,
            'blood_type_name' => $this->bloodType->name,
        ];
    }
}
