<?php

namespace App\DTOs\Visit;

readonly class VisitDTOUpdate
{
    public function __construct(
        public ?int $medical_diagnosis,
        public ?int $prescription,
        public ?int $notes,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            medical_diagnosis: isset($request['medical_diagnosis']) ? $request['medical_diagnosis'] : null,
            prescription: isset($request['prescription']) ? $request['prescription'] : null,
            notes: isset($request['notes']) ? $request['notes'] : null,
        );
    }
    public function toArray(): array
    {
        return array_filter([
            'medical_diagnosis' => $this->medical_diagnosis,
            'prescription' => $this->prescription,
            'notes' => $this->notes,
        ], fn($value) => !is_null($value));
    }
}