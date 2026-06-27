<?php

namespace App\DTOs\PatientComplaint;

readonly class PatientComplaintDTO
{
    public function __construct(
        public int $patient_id,
        public string $content,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            patient_id: $request['patient_id'],
            content: $request['content'],
        );
    }
    public function toArray(): array
    {
        return [
            'patient_id' => $this->patient_id,
            'content' => $this->content,
        ];
    }
}