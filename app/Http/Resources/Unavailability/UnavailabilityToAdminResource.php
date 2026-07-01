<?php

namespace App\Http\Resources\Unavailability;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnavailabilityToAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->doctorUnavailability) {
            $makerIdFieldName = 'doctor_id';
            $makerFullnameFieldName = 'doctor_fullname';
            $makerId = $this->doctorUnavailability->doctor_id;
            $makerFullname = $this->doctorUnavailability->doctor->user->first_name . ' ' .
                $this->doctorUnavailability->doctor->user->last_name;
        } else {
            $makerIdFieldName = 'made_by_admin_id';
            $makerFullnameFieldName = 'made_by_admin_fullname';
            $makerId = $this->medicalCenterUnavailability->made_by_admin_id;
            $makerFullname = $this->medicalCenterUnavailability->madeByAdmin->user->first_name . ' ' .
                $this->medicalCenterUnavailability->madeByAdmin->user->last_name;
        }

        return [
            'id' => $this->id,
            'from_date' => $this->from_date->format('Y-m-d'),
            'to_date' => $this->to_date->format('Y-m-d'),
            'reason_type' => $this->reason_type,
            'justification' => $this->justification,
            'type' => $this->type,
            "$makerIdFieldName" => $makerId,
            "$makerFullnameFieldName" => $makerFullname,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
