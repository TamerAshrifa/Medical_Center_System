<?php

namespace App\DTOs\DayWorkTime;

readonly class DayWorkTimeDTOUpdate
{
    public function __construct(
        public ?string $start_time,
        public ?string $end_time,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            start_time: isset($request['start_time']) ?
            $request['start_time'] : null,
            end_time: isset($request['end_time']) ?
            $request['end_time'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];
    }

}