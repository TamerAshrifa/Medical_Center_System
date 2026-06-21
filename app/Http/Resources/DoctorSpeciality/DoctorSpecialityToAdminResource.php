<?php

namespace App\Http\Resources\DoctorSpeciality;

use App\Http\Resources\Doctor\DoctorToAdminResource;
use App\Http\Resources\Speciality\SpecialityToAdminResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorSpecialityToAdminResource extends JsonResource
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
            'doctor' => new DoctorToAdminResource($this->doctor),
            'speciality' => new SpecialityToAdminResource($this->speciality),
            'experience_starting_date' => $this->experience_starting_date->format('Y-m-d'),
            'view_experience' => $this->view_experience,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
