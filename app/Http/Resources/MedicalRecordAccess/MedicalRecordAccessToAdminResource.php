<?php

namespace App\Http\Resources\MedicalRecordAccess;

use App\Http\Resources\Doctor\DoctorToAdminResource;
use App\Http\Resources\Patient\PatientToAdminResource;
use App\Http\Resources\Patient\PatientToDoctorResource;
use App\Http\Resources\Visit\VisitToAdminResource;
use App\Http\Resources\Visit\VisitToDoctorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalRecordAccessToAdminResource extends JsonResource
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
            'patient' => new PatientToAdminResource($this->patient),
            'doctor' => new DoctorToAdminResource($this->doctor),
            'visit' => new VisitToAdminResource($this->visit),
        ];
    }
}
