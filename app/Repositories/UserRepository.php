<?php

namespace App\Repositories;

use App\Enums\UserRoleEnum;
use App\Models\User;
use App\DTOs\UserDTO;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function create(UserDTO $dtoUser, UserRoleEnum $role = UserRoleEnum::PATIENT, $email_verified_at = null): User
    {
        return User::create([
            'first_name' => $dtoUser->first_name,
            'last_name' => $dtoUser->last_name,
            'email' => $dtoUser->email,
            'email_verified_at' => $email_verified_at,
            'password' => $dtoUser->password,
            'phone' => $dtoUser->phone,
            'date_of_birth' => $dtoUser->date_of_birth,
            'gender' => $dtoUser->gender,
            'photo' => $dtoUser->photo,
            'username' => $dtoUser->username,
            'role' => $role,
        ]);
    }
    public function findByEmailOrUsername(string $email_or_username)
    {
        return User::where('email', $email_or_username)
            ->orWhere('username', $email_or_username)
            ->first();
    }
    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
    public function resetPassword(string $email, string $newPassword): void
    {
        User::where('email', $email)->update(['password' => $newPassword]);
    }
    public function deleteAllTokensOfUser(string $email): void
    {
        $user = User::where('email', $email)->first();
        if ($user != null)
            $user->tokens()->delete();
    }
}
