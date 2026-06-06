<?php

namespace App\DTOs\Doctor;

readonly class DoctorDTOUpdate
{
    public function __construct(
        public ?int $room_id,
        public ?int $appointment_duration,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            room_id: isset($request['room_id']) ? $request['room_id'] : null,
            appointment_duration: isset($request['appointment_duration']) ?
            $request['appointment_duration'] : null,
        );
    }
    public function toArray(): array
    {
        return [
            'room_id' => $this->room_id,
            'appointment_duration' => $this->appointment_duration,
        ];
    }
}