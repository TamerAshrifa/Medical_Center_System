<?php

namespace App\Http\Resources\Transfer;

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
        $appointmentDatetime = null;
        if ($this->appointment_id)
            $appointmentDatetime = $this->appointment->datetime->format('Y-m-d H:i');

        return [
            'id' => $this->id,
            'referring_doctor_id' => $this->referring_doctor_id,
            'referring_doctor_fullname' => $this->referringDoctor->user->first_name . ' ' .
                $this->referringDoctor->user->last_name,
            'receiving_doctor_id' => $this->receiving_doctor_id,
            'receiving_doctor_fullname' => $this->receivingDoctor->user->first_name . ' ' .
                $this->receivingDoctor->user->last_name,
            'patient_id' => $this->patient_id,
            'patient_fullname' => $this->patient->user->first_name . ' ' .
                $this->patient->user->last_name,
            'message' => $this->message,
            'appointment_id' => $this->appointment_id,
            'appointment_datetime' => $appointmentDatetime,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
