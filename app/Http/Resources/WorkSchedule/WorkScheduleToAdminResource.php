<?php

namespace App\Http\Resources\WorkSchedule;

use App\Enums\WorkScheduleTypeEnum;
use App\Http\Resources\DoctorWorkSchedule\DoctorWorkScheduleToAdminResource;
use App\Http\Resources\MedicalCenterWorkSchedule\MedicalCenterWorkScheduleToAdminResource;
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
        $workScheduleSpecification = $this->type == WorkScheduleTypeEnum::DOCTOR ?
            new DoctorWorkScheduleToAdminResource($this->doctorWorkSchedule) :
            new MedicalCenterWorkScheduleToAdminResource($this->medicalCenterWorkSchedule);

        $effective_to_date = $this->effective_to_date ?
            $this->effective_to_date->format('Y-m-d') :
            null;
        return [
            'id' => $this->id,
            'effective_from_date' => $this->effective_from_date->format('Y-m-d'),
            'effective_to_date' => $effective_to_date,
            'type' => $this->type,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'work_schedule_specification' => $workScheduleSpecification,
        ];
    }
}
