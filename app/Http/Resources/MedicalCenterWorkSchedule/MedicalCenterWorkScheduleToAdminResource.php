<?php

namespace App\Http\Resources\MedicalCenterWorkSchedule;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalCenterWorkScheduleToAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'made_by_admin_id' => $this->made_by_admin_id,
            'made_by_admin_fullname' => $this->madeByAdmin->user->first_name . ' ' .
                $this->madeByAdmin->user->last_name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
