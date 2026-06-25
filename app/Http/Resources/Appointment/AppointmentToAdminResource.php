<?php

namespace App\Http\Resources\Appointment;

use App\Http\Resources\Doctor\DoctorToAdminResource;
use App\Http\Resources\Doctor\DoctorToPatientResource;
use App\Http\Resources\Patient\PatientToAdminResource;
use App\Models\Doctor;
use App\Models\User;
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
        $userId = Doctor::where('id', $this->doctor_id)->valueOrFail('user_id');
        $doctorUser = User::where('id', $userId)->first(['first_name', 'last_name']);
        $userId = Doctor::where('id', $this->patient_id)->valueOrFail('user_id');
        $patientUser = User::where('id', $userId)->first(['first_name', 'last_name']);

        // $visit = $this->visit ? new VisitToAdmin
        return [
            'id' => $this->id,
            'datetime' => $this->datetime->format('Y-m-d H:i'),
            'status' => $this->status->value,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'doctor_id' => $this->doctor_id,
            'doctor_fullname' => $doctorUser->first_name . ' ' . $doctorUser->last_name,
            'patient_id' => $this->patient_id,
            'patient_fullname' => $patientUser->first_name . ' ' . $patientUser->last_name,
        ];
    }
}
