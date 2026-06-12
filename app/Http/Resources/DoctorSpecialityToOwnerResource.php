<?php

namespace App\Http\Resources;

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
            'experience_starting_date' => $this->experience_starting_date,
            'view_experience' => $this->view_experience,
        ];
    }
}
