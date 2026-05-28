<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;
    protected static int $userIdCounter = 2;
    private function _role(int $id): string
    {
        if ($id > 30)
            $id = 1;

        if ($id >= 2 && $id <= 5)
            return 'admin';
        else if ($id >= 6 && $id <= 20)
            return 'patient';
        else if ($id >= 21 && $id <= 30)
            return 'doctor';

        return 'patient';
    }

    public function definition(): array
    {
        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),

            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(),

            'date_of_birth' => fake()->date(),
            'gender' => fake()->boolean(),
            'username' => fake()->userName(),

            'password' => static::$password ??= 'password',
            //   'role' => $this->_role(static::$userIdCounter++),

            'remember_token' => Str::random(10),
            'created_at' => now(),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
