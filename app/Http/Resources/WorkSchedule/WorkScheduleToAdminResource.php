<?php

namespace App\Http\Resources\WorkSchedule;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkScheduleToAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->doctorWorkSchedule) {
            $makerIdFieldName = 'doctor_id';
            $makerId = $this->doctorWorkSchedule->doctor->id;
            $makerFullnameFieldName = 'doctor_fullname';
            $makerFullname = $this->doctorWorkSchedule->doctor->user->first_name . ' ' .
                $this->doctorWorkSchedule->doctor->user->last_name;
        } else {
            $makerIdFieldName = 'made_by_admin_id';
            $makerId = $this->medicalCenterWorkSchedule->madeByAdmin->id;
            $makerFullnameFieldName = 'made_by_admin_fullname';
            $makerFullname = $this->medicalCenterWorkSchedule->madeByAdmin->user->first_name . ' ' .
                $this->medicalCenterWorkSchedule->madeByAdmin->user->last_name;
        }

        return [
            'id' => $this->id,
            'effective_from_date' => $this->effective_from_date->format('Y-m-d'),
            'effective_to_date' => $this->effective_to_date ?
                $this->effective_to_date->format('Y-m-d') : null,
            'type' => $this->type,
            "$makerIdFieldName" => $makerId,
            "$makerFullnameFieldName" => $makerFullname,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
