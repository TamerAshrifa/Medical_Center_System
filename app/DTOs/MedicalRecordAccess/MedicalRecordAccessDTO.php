<?php

namespace App\DTOs\MedicalRecordAccess;

readonly class MedicalRecordAccessDTO
{
    public function __construct(
        public int $visit_id,
        public int $patient_id,
        public int $can_accessed_by_doctor_id,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            visit_id: $request['visit_id'],
            patient_id: $request['patient_id'],
            can_accessed_by_doctor_id: $request['can_accessed_by_doctor_id'],
        );
    }
    public function toArray(): array
    {
        return [
            'visit_id' => $this->visit_id,
            'patient_id' => $this->patient_id,
            'can_accessed_by_doctor_id' => $this->can_accessed_by_doctor_id,
        ];
    }
}