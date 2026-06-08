<?php

namespace App\DTOs\User;

readonly class UserDTO
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public string $email,
        public string $password,
        public string $phone,
        public string $date_of_birth,
        public bool $gender,
        public string $username,
        public ?string $photo,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            first_name: $request['first_name'],
            last_name: $request['last_name'],
            email: $request['email'],
            password: $request['password'],
            phone: $request['phone'],
            date_of_birth: $request['date_of_birth'],
            gender: $request['gender'],
            username: $request['username'],
            photo: isset($request['photo']) ? $request['photo'] : null
        );
    }

    public function toArray(): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => $this->password,
            'phone' => $this->phone,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'username' => $this->username,
            'photo' => $this->photo,
        ];
    }
}