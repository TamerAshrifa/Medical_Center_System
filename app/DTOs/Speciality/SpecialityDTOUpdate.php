<?php

namespace App\DTOs\Speciality;

readonly class SpecialityDTOUpdate
{
    public function __construct(
        public ?string $name,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            name: isset($request['name']) ? $request['name'] : null
        );
    }
    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}