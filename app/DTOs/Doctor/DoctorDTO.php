<?php

namespace App\DTOs\Doctor;

readonly class DoctorDTO
{
    public function __construct(
        public int $user_id,
        public int $room_id,
        public int $added_by_admin_id,
        public int $appointment_duration,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            user_id: $request['user_id'],
            room_id: $request['room_id'],
            added_by_admin_id: $request['added_by_admin_id'],
            appointment_duration: $request['appointment_duration'],
        );
    }
    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'room_id' => $this->room_id,
            'added_by_admin_id' => $this->added_by_admin_id,
            'appointment_duration' => $this->appointment_duration,
        ];
    }
}