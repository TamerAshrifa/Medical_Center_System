<?php

namespace App\DTOs\Appointment;

class AppointmentDTO
{
    public function __construct(
        public int $patient_id,
        public int $doctor_id,
        public string $datetime,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            patient_id: $request['patient_id'],
            doctor_id: $request['doctor_id'],
            datetime: $request['datetime'],
        );
    }

    public function toArray(): array
    {
        return [
            'patient_id' => $this->patient_id,
            'doctor_id' => $this->doctor_id,
            'datetime' => $this->datetime,
        ];
    }
}