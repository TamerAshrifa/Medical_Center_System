<?php

namespace App\Http\Resources\Visit;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitToDoctorResource extends JsonResource
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
            'actual_time' => $this->actual_time->format('Y-m-d H:i'),
            'medical_diagnosis' => $this->medical_diagnosis,
            'prescription' => $this->prescription,
            'notes' => $this->notes,
            'notes_for_other_doctors' => $this->notes_for_other_doctors,
        ];
    }
}
