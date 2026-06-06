<?php

namespace App\DTOs\Speciality;

readonly class SpecialityDTO
{
    public function __construct(
        public string $name,
        public int $added_by_admin_id,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            name: $request['name'],
            added_by_admin_id: $request['added_by_admin_id'],
        );
    }
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'added_by_admin_id' => $this->added_by_admin_id,
        ];
    }
}