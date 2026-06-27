<?php

namespace App\Http\Resources\Unavailability;

use App\Enums\UnavailabilityTypeEnum;
use App\Repositories\AdminRepository;
use App\Repositories\DoctorRepository;
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
        if ($this->type == UnavailabilityTypeEnum::DOCTOR) {
            $makerId = $this->doctorUnavailability->doctor_id;
            $makerFullname = (new DoctorRepository())->getDoctorFullname($makerId);
        } else {
            $makerId = $this->medicalCenterUnavailability->made_by_admin_id;
            $makerFullname = (new AdminRepository())->getAdminFullname($makerId);
        }

        return [
            'id' => $this->id,
            'from_date' => $this->from_date->format('Y-m-d'),
            'to_date' => $this->to_date->format('Y-m-d'),
            'reason_type' => $this->reason_type,
            'justification' => $this->justification,
            'type' => $this->type,
            'maker_id' => $makerId,
            'maker_fullname' => $makerFullname,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
