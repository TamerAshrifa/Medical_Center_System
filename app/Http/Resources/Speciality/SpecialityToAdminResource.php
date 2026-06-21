<?php

namespace App\Http\Resources\Speciality;

use App\Http\Resources\Admin\AdminToAdminResource;
use App\Http\Resources\Doctor\DoctorToAdminResource;
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
            'added_by_admin' => new AdminToAdminResource($this->addedByAdmin),
            'doctors' => DoctorToAdminResource::collection($this->whenLoaded('doctors')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
