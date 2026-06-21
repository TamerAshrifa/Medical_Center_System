<?php

namespace App\Http\Resources\Appointment;

use App\Http\Resources\Doctor\DoctorToAdminResource;
use App\Http\Resources\Doctor\DoctorToPatientResource;
use App\Http\Resources\Patient\PatientToAdminResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentToAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $visit = $this->visit ? new VisitToAdmin
        return [
            'id' => $this->id,
            'datetime' => $this->datetime->format('Y-m-d H:i'),
            'status' => $this->status->value,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'doctor_id' => $this->doctor_id,
            'patient_id' => $this->patient_id,
        ];
    }
}
