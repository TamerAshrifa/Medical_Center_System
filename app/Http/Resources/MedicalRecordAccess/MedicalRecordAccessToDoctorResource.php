<?php

namespace App\Http\Resources\MedicalRecordAccess;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalRecordAccessToDoctorResource extends JsonResource
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
            'patient_id' => $this->patient_id,
            'patient_fullname' => $this->patient->user->first_name . ' ' .
                $this->patient->user->last_name,
            'visit_id' => $this->visit_id,
            'visit_actual_time' => $this->visit->actual_time,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
