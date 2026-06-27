<?php

namespace App\Http\Resources\MedicalRecordAccess;

use App\Http\Resources\Patient\PatientToDoctorResource;
use App\Http\Resources\Visit\VisitToDoctorResource;
use App\Models\Patient;
use App\Models\User;
use App\Models\Visit;
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
        $userId = Patient::where('id', $this->patient_id)->valueOrFail('user_id');
        $patientUser = User::where('id', $userId)->firstOrFail(['first_name', 'last_name']);

        $visit = Visit::where('id', $this->visit_id)->firstOrFail(['actual_time', 'appointment_id']);
        $visitActualTime = $visit->actual_time->format('H:i');
        $visitAppointmentDate = $visit->appointment->datetime->format('Y-m-d');
        $visitDatetime = $visitAppointmentDate . ' ' . $visitActualTime;
        return [
            'id' => $this->id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'patient_id' => $this->patient_id,
            'patient_fullname' => $patientUser->first_name . ' ' . $patientUser->last_name,
            'visit_id' => $this->visit_id,
            'visit_datetime' => $visitDatetime,
        ];
    }
}
