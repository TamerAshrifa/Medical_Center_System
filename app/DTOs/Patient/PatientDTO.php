<?php

namespace App\DTOs\Patient;

readonly class PatientDTO
{
    public function __construct(
        public int $user_id,
        public int $blood_type_id,
        public ?string $allergies,
        public ?string $chronic_diseases,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            user_id: $request['user_id'],
            blood_type_id: $request['blood_type_id'],
            allergies: isset($request['allergies']) ? $request['allergies'] : null,
            chronic_diseases: isset($request['chronic_diseases']) ? $request['chronic_diseases'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'blood_type_id' => $this->blood_type_id,
            'allergies' => $this->allergies,
            'chronic_diseases' => $this->chronic_diseases,
        ];
    }
}