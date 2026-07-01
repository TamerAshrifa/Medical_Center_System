<?php

namespace App\Http\Resources\Visit;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitToPatientResource extends JsonResource
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
            'appointment_id' => $this->appointment_id,
            'doctor_id' => $this->appointment->doctor->id,
            'doctor_fullname' => $this->appointment->doctor->user->first_name . ' ' .
                $this->appointment->doctor->user->last_name,
            'actual_time' => $this->actual_time->format('Y-m-d H:i'),
            'medical_diagnosis' => $this->medical_diagnosis,
            'prescription' => $this->prescription,
            'notes' => $this->notes,
        ];
    }
}
