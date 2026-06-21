<?php

namespace App\Http\Resources\MedicalCenterWorkSchedule;

use App\Http\Resources\Admin\AdminToAdminResource;
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
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'made_by_admin' => new AdminToAdminResource($this->madeByAdmin),
        ];
    }
}
