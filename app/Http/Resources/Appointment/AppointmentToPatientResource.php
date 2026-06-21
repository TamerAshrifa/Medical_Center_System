<?php

namespace App\Http\Resources\Appointment;

use App\Http\Resources\Doctor\DoctorToPatientResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentToPatientResource extends JsonResource
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
            'datetime' => $this->datetime->format('Y-m-d H:i'),
            'status' => $this->status ? $this->status->value : null,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'patient_id' => $this->patient_id,
            'doctor' => new DoctorToPatientResource($this->doctor),
        ];
    }
}
