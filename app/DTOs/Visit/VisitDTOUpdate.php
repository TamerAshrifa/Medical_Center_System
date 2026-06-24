<?php

namespace App\DTOs\Visit;

readonly class VisitDTOUpdate
{
    public function __construct(
        public ?string $medical_diagnosis,
        public ?string $prescription,
        public ?string $notes,
        public ?string $notes_for_other_doctors,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            medical_diagnosis: isset($request['medical_diagnosis']) ? $request['medical_diagnosis'] : null,
            prescription: isset($request['prescription']) ? $request['prescription'] : null,
            notes: isset($request['notes']) ? $request['notes'] : null,
            notes_for_other_doctors: isset($request['notes_for_other_doctors']) ?
            $request['notes_for_other_doctors'] : null,
        );
    }
    public function toArray(): array
    {
        return array_filter([
            'medical_diagnosis' => $this->medical_diagnosis,
            'prescription' => $this->prescription,
            'notes' => $this->notes,
            'notes_for_other_doctors' => $this->notes_for_other_doctors,
        ], fn($value) => !is_null($value));
    }
}