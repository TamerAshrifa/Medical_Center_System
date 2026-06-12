<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorSpecialityToPatientResource extends JsonResource
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
            $returned['experience_starting_date'] = $this->experience_starting_date;

        return $returned;
    }
}
