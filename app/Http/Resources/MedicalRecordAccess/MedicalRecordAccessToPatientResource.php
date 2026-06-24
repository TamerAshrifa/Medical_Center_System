<?php

namespace App\Http\Resources\MedicalRecordAccess;

use App\Http\Resources\Doctor\DoctorToPatientResource;
use App\Http\Resources\Patient\PatientToDoctorResource;
use App\Http\Resources\Visit\VisitToDoctorResource;
use App\Http\Resources\Visit\VisitToPatientResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalRecordAccessToPatientResource extends JsonResource
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
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'doctor' => new DoctorToPatientResource($this->doctor),
            'visit' => new VisitToPatientResource($this->visit),
        ];
    }
}
