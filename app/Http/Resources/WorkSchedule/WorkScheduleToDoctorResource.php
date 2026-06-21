<?php

namespace App\Http\Resources\WorkSchedule;

use App\Enums\WorkScheduleTypeEnum;
use App\Http\Resources\DoctorWorkSchedule\DoctorWorkScheduleToOwnerResource;
use App\Http\Resources\MedicalCenterWorkSchedule\MedicalCenterWorkScheduleToDoctorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkScheduleToDoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $workScheduleSpecification = $this->type == WorkScheduleTypeEnum::DOCTOR ?
            new DoctorWorkScheduleToOwnerResource($this->doctorWorkSchedule) :
            new MedicalCenterWorkScheduleToDoctorResource($this->medicalCenterWorkSchedule);
        $effective_to_date = $this->effective_to_date ?
            $this->effective_to_date->format('Y-m-d') :
            null;
        return [
            'id' => $this->id,
            'effective_from_date' => $this->effective_from_date->format('Y-m-d'),
            'effective_to_date' => $effective_to_date,
            'work_schedule_specification' => $workScheduleSpecification,
        ];
    }
}
