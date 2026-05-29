<?php

namespace App\DTOs;

class Dto_User
{
     public function __construct(
          public string $first_name,
          public string $last_name,
          public string $email,
          public string $password,
          public string $phone,
          public $date_of_birth,
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
}