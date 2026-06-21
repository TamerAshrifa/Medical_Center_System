<?php

namespace App\GeneralClasses;

use App\Enums\WorkScheduleTypeEnum;

readonly class ScheduleSegment
{
    public function __construct(
        public string $effective_from_date,
        public array $dayWorkTimeDTOs,

    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            effective_from_date: $request['effective_from_date'],
            dayWorkTimeDTOs: $request['dayWorkTimeDTOs'],
        );
    }

    public function toArray(): array
    {
        return [
            'effective_from_date' => $this->effective_from_date,
            'dayWorkTimeDTOs' => $this->dayWorkTimeDTOs,
        ];
    }
}