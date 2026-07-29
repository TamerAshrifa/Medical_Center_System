<?php

namespace App\DTOs\DoctorSpeciality;

readonly class DoctorSpecialityDTOUpdate
{
    public function __construct(
        public ?string $experience_starting_date,
        public ?bool $view_experience,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            experience_starting_date: isset($request['experience_starting_date']) ?
            $request['experience_starting_date'] : null,
            view_experience: isset($request['view_experience']) ?
            $request['view_experience'] : null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'experience_starting_date' => $this->experience_starting_date,
            'view_experience' => $this->view_experience,
        ], fn($value) => !is_null($value));
    }

}