<?php

namespace App\DTOs\Patient;

readonly class PatientDTOUpdate
{
    public function __construct(
        public ?int $blood_type_id,
        public ?string $allergies,
        public ?string $chronic_diseases,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            blood_type_id: isset($request['blood_type_id']) ? $request['blood_type_id'] : null,
            allergies: isset($request['allergies']) ? $request['allergies'] : null,
            chronic_diseases: isset($request['chronic_diseases']) ? $request['chronic_diseases'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'blood_type_id' => $this->blood_type_id,
            'allergies' => $this->allergies,
            'chronic_diseases' => $this->chronic_diseases,
        ];
    }
}