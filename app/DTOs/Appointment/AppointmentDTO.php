<?php

namespace App\DTOs\DayWorkTime;

class AppointmentDTO
{
    public function __construct(
        public int $weekday_id,
        public string $start_time,
        public string $end_time,
        public ?int $work_schedule_id,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            weekday_id: $request['weekday_id'],
            start_time: $request['start_time'],
            end_time: $request['end_time'],
            work_schedule_id: isset($request['work_schedule_id']) ?
            $request['work_schedule_id'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'weekday_id' => $this->weekday_id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'work_schedule_id' => $this->work_schedule_id,
        ];
    }
}