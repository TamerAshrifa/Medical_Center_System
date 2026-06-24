<?php

namespace App\DTOs\Visit;

readonly class VisitDTO
{
    public function __construct(
        public int $appointment_id,
        public string $actual_time,
        public string $medical_diagnosis,
        public string $prescription,
        public string $notes,
        public ?string $notes_for_other_doctors,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            appointment_id: $request['appointment_id'],
            actual_time: $request['actual_time'],
            medical_diagnosis: $request['medical_diagnosis'],
            prescription: $request['prescription'],
            notes: $request['notes'],
            notes_for_other_doctors: isset($request['notes_for_other_doctors']) ?
            $request['notes_for_other_doctors'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'appointment_id' => $this->appointment_id,
            'actual_time' => $this->actual_time,
            'medical_diagnosis' => $this->medical_diagnosis,
            'prescription' => $this->prescription,
            'notes' => $this->notes,
            'notes_for_other_doctors' => $this->notes_for_other_doctors,
        ];
    }
}