<?php

namespace App\DTOs\DoctorSpeciality;

readonly class DoctorSpecialityDTO
{
    public function __construct(
        public int $doctor_id,
        public int $speciality_id,
        public string $experience_starting_date,
        public bool $view_experience,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            doctor_id: $request['doctor_id'],
            speciality_id: $request['speciality_id'],
            experience_starting_date: $request['experience_starting_date'],
            view_experience: $request['view_experience'],
        );
    }

    public function toArray(): array
    {
        return [
            'doctor_id' => $this->doctor_id,
            'speciality_id' => $this->speciality_id,
            'experience_starting_date' => $this->experience_starting_date,
            'view_experience' => $this->view_experience,
        ];
    }
}