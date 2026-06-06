<?php

namespace App\Repositories;

use App\Enums\UserRoleEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Models\User;
use App\DTOs\User\UserDTO;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends Repository implements UserRepositoryInterface
{
    public function create(
        UserDTO $dtoUser,
        $email_verified_at = null
    ): Response {
        return $this->executeCode(function () use ($dtoUser, $email_verified_at) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                User::create([
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
                ]),
                201
            );
        });
    }
    public function findByEmailOrUsername(string $email_or_username): Response
    {
        return $this->executeCode(function () use ($email_or_username) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                User::where('email', $email_or_username)
                    ->orWhere('username', $email_or_username)
                    ->first()
            );
        });
    }
    public function findByEmail(string $email): Response
    {
        return $this->executeCode(function () use ($email) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                User::where('email', $email)->first()
            );
        });
    }
    public function resetPassword(string $email, string $newPassword): Response
    {
        return $this->executeCode(function () use ($email, $newPassword) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                User::where('email', $email)->update(['password' => $newPassword])
            );
        });
    }
    public function deleteAllTokensOfUser(string $email): Response
    {
        return $this->executeCode(function () use ($email) {
            $user = User::where('email', $email)->first();
            if ($user != null)
                $user->tokens()->delete();
            return new Response(ResponseStatusEnum::SUCCESS);
        }, true, true);
    }
    public function delete(int $userId): Response
    {
        return $this->executeCode(function () use ($userId) {
            $user = User::find($userId);
            if ($user != null)
                $user->delete();
            return new Response(ResponseStatusEnum::SUCCESS, null, null, 204);
        }, true, true);
    }

    public function logoutUser(User $currentUser): Response
    {
        return $this->executeCode(function () use ($currentUser) {
            $currentUser->currentAccessToken()->delete();
            return new Response(ResponseStatusEnum::SUCCESS);
        }, true, true);
    }

}
