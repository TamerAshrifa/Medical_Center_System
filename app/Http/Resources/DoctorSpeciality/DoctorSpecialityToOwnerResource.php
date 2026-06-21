<?php

namespace App\Http\Resources\DoctorSpeciality;

use App\Http\Resources\Speciality\SpecialityToAdminResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorSpecialityToOwnerResource extends JsonResource
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
            'speciality' => new SpecialityToAdminResource($this->speciality),
            'experience_starting_date' => $this->experience_starting_date->format('Y-m-d'),
            'view_experience' => $this->view_experience,
        ];
    }
}
