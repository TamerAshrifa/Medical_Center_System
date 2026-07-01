<?php

namespace App\Http\Resources\DoctorSpeciality;

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
            'doctor_id' => $this->doctor_id,
            'doctor_fullname' => $this->doctor->user->first_name . ' ' .
                $this->doctor->user->last_name,
            'speciality_id' => $this->speciality_id,
            'speciality_name' => $this->speciality->name,
            'experience_starting_date' => $this->experience_starting_date->format('Y-m-d'),
            'view_experience' => $this->view_experience,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
