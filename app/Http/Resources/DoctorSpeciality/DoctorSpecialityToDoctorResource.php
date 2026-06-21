<?php

namespace App\Http\Resources\DoctorSpeciality;

use App\Http\Resources\Doctor\DoctorToDoctorResource;
use App\Http\Resources\Speciality\SpecialityToDoctorResource;
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
            'doctor' => new DoctorToDoctorResource($this->doctor),
            'speciality' => new SpecialityToDoctorResource($this->speciality),
        ];
        if ($this->view_experience)
            $returned['experience_starting_date'] = $this->experience_starting_date->format('Y-m-d');

        return $returned;
    }
}
