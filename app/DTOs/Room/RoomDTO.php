<?php

namespace App\DTOs\Room;

readonly class RoomDTO
{
    public function __construct(
        public string $name,
        public float $monthly_rent,
        public int $last_update_by_admin_id,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            name: $request['name'],
            monthly_rent: $request['monthly_rent'],
            last_update_by_admin_id: $request['last_update_by_admin_id'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'monthly_rent' => $this->monthly_rent,
            'last_update_by_admin_id' => $this->last_update_by_admin_id,
        ];
    }
}