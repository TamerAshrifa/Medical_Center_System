<?php

namespace App\Http\Resources\MedicalRecordAccess;

use App\Http\Resources\Doctor\DoctorToPatientResource;
use App\Http\Resources\Patient\PatientToDoctorResource;
use App\Http\Resources\Visit\VisitToDoctorResource;
use App\Http\Resources\Visit\VisitToPatientResource;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Visit;
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
        $userId = Doctor::where('id', $this->can_accessed_by_doctor_id)->valueOrFail('user_id');
        $doctorUser = User::where('id', $userId)->firstOrFail(['first_name', 'last_name']);

        $visit = Visit::where('id', $this->visit_id)->firstOrFail(['actual_time', 'appointment_id']);
        $visitActualTime = $visit->actual_time->format('H:i');
        $visitAppointmentDate = $visit->appointment->datetime->format('Y-m-d');
        $visitDatetime = $visitAppointmentDate . ' ' . $visitActualTime;
        return [
            'id' => $this->id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'can_accessed_by_doctor_id' => $this->can_accessed_by_doctor_id,
            'doctor_fullname' => $doctorUser->first_name . ' ' . $doctorUser->last_name,
            'visit_id' => $this->visit_id,
            'visit_datetime' => $visitDatetime,
        ];
    }
}
