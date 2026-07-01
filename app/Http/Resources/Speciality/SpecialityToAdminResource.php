<?php

namespace App\Http\Resources\Speciality;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecialityToAdminResource extends JsonResource
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
            'name' => $this->name,
            'added_by_admin_id' => $this->added_by_admin_id,
            'added_by_admin_fullname' => $this->addedByAdmin->user->first_name . ' ' .
                $this->addedByAdmin->user->last_name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
