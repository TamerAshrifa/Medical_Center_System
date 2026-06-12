<?php

namespace App\DTOs\WorkScheduleDTO;

use App\Enums\WorkScheduleTypeEnum;

readonly class WorkScheduleDTO
{
    public function __construct(
        public string $effective_from_date,
        public string $effective_to_date,
        public WorkScheduleTypeEnum $type,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            effective_from_date: $request['effective_from_date'],
            effective_to_date: $request['effective_to_date'],
            type: $request['type'],
        );
    }

    public function toArray(): array
    {
        return [
            'effective_from_date' => $this->effective_from_date,
            'effective_to_date' => $this->effective_to_date,
            'type' => $this->type->value,
        ];
    }
}