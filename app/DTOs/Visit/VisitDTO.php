<?php

namespace App\DTOs\Visit;

readonly class VisitDTO
{
    public function __construct(
        public int $appointement_id,
        public int $actual_time,
        public int $medical_diagnosis,
        public int $prescription,
        public int $notes,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            appointement_id: $request['appointement_id'],
            actual_time: $request['actual_time'],
            medical_diagnosis: $request['medical_diagnosis'],
            prescription: $request['prescription'],
            notes: $request['notes'],
        );
    }
    public function toArray(): array
    {
        return [
            'appointement_id' => $this->appointement_id,
            'actual_time' => $this->actual_time,
            'medical_diagnosis' => $this->medical_diagnosis,
            'prescription' => $this->prescription,
            'notes' => $this->notes,
        ];
    }
}