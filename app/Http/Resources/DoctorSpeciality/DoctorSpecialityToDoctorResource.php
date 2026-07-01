<?php

namespace App\Http\Resources\DoctorSpeciality;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorSpecialityToDoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $returned = [
            'id' => $this->id,
            'doctor_id' => $this->doctor_id,
            'doctor_fullname' => $this->doctor->user->first_name . ' ' .
                $this->doctor->user->last_name,
            'speciality_id' => $this->speciality_id,
            'speciality_name' => $this->speciality->name,
        ];
        if ($this->view_experience)
            $returned['experience_starting_date'] = $this->experience_starting_date->format('Y-m-d');

        return $returned;
    }
}
