<?php

namespace App\DTOs\Transfer;

readonly class TransferDTO
{
    public function __construct(
        public int $referring_doctor_id,
        public int $receiving_doctor_id,
        public int $patient_id,
        public string $message,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            referring_doctor_id: $request['referring_doctor_id'],
            receiving_doctor_id: $request['receiving_doctor_id'],
            patient_id: $request['patient_id'],
            message: $request['message'],
        );
    }
    public function toArray(): array
    {
        return [
            'referring_doctor_id' => $this->referring_doctor_id,
            'receiving_doctor_id' => $this->receiving_doctor_id,
            'patient_id' => $this->patient_id,
            'message' => $this->message,
        ];
    }
}