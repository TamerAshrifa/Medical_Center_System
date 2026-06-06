<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;
    protected static ?int $counter;

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
