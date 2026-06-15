<?php

namespace App\DTOs\WorkScheduleDTO;

readonly class WorkScheduleDTOUpdate
{
    public function __construct(
        public ?string $effective_from_date,
        public ?string $effective_to_date,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            effective_from_date: isset($request['effective_from_date']) ?
            $request['effective_from_date'] : null,
            effective_to_date: isset($request['effective_to_date']) ?
            $request['effective_to_date'] : null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'effective_from_date' => $this->effective_from_date,
            'effective_to_date' => $this->effective_to_date,
        ], fn($value) => !is_null($value));
    }
}