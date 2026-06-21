<?php

namespace App\Http\Resources\Speciality;

use App\Http\Resources\Doctor\DoctorToDoctorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecialityToDoctorResource extends JsonResource
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
            'doctors' => DoctorToDoctorResource::collection($this->whenLoaded('doctors')),
        ];
    }
}
