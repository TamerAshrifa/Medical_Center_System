<?php

namespace App\DTOs\Room;

readonly class RoomDTOUpdate
{
    public function __construct(
        public ?string $name,
        public ?float $monthly_rent,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            name: isset($request['name']) ? $request['name'] : null,
            monthly_rent: isset($request['monthly_rent']) ? $request['monthly_rent'] : null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'monthly_rent' => $this->monthly_rent,
        ], fn($value) => !is_null($value));
    }
}