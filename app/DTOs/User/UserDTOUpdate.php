<?php

namespace App\DTOs\User;

readonly class UserDTOUpdate
{
    public function __construct(
        public ?string $first_name,
        public ?string $last_name,
        public ?string $phone,
        public ?string $date_of_birth,
        public ?bool $gender,
        public ?string $username,
        public ?string $photo,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            first_name: isset($request['first_name']) ? $request['first_name'] : null,
            last_name: isset($request['last_name']) ? $request['last_name'] : null,
            phone: isset($request['phone']) ? $request['phone'] : null,
            date_of_birth: isset($request['date_of_birth']) ? $request['date_of_birth'] : null,
            gender: isset($request['gender']) ? $request['gender'] : null,
            username: isset($request['username']) ? $request['username'] : null,
            photo: isset($request['photo']) ? $request['photo'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'username' => $this->username,
            'photo' => $this->photo,
        ];
    }

}