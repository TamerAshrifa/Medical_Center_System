<?php

namespace App\Http\Resources\Transfer;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransferToAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $userId = Doctor::where('id', $this->referring_doctor_id)->valueOrFail('user_id');
        $referringDoctorUser = User::where('id', $userId)->firstOrFail(['first_name', 'last_name']);
        $referringDoctorFullname = $referringDoctorUser->first_name . ' ' . $referringDoctorUser->last_name;

        $userId = Doctor::where('id', $this->receiving_doctor_id)->valueOrFail('user_id');
        $receivingDoctorUser = User::where('id', $userId)->firstOrFail(['first_name', 'last_name']);
        $receivingDoctorFullname = $receivingDoctorUser->first_name . ' ' . $receivingDoctorUser->last_name;

        $userId = Patient::where('id', $this->patient_id)->valueOrFail('user_id');
        $patientUser = User::where('id', $userId)->firstOrFail(['first_name', 'last_name']);
        $patientFullname = $patientUser->first_name . ' ' . $patientUser->last_name;

        $appointmentDatetime = null;
        if ($this->appointment_id)
            $appointmentDatetime = Appointment::where('id', $this->appointment_id)->valueOrFail('datetime');

        return [
            'id' => $this->id,
            'referring_doctor_id' => $this->referring_doctor_id,
            'referring_doctor_fullname' => $referringDoctorFullname,
            'receiving_doctor_id' => $this->receiving_doctor_id,
            'receiving_doctor_fullname' => $receivingDoctorFullname,
            'patient_id' => $this->patient_id,
            'patient_fullname' => $patientFullname,
            'message' => $this->message,
            'appointment_id' => $this->appointment_id,
            'appointment_datetime' => $appointmentDatetime->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
