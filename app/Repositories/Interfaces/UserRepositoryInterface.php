<?php

namespace App\Repositories\Interfaces;

use App\Enums\UserRoleEnum;
use App\DTOs\UserDTO;
use App\Models\User;


interface UserRepositoryInterface
{
    public function create(UserDTO $dtoUser, UserRoleEnum $role = UserRoleEnum::PATIENT, $email_verified_at = null): User;
    public function findByEmailOrUsername(string $email_or_username);
    public function findByEmail(string $email);
    public function resetPassword(string $email, string $newPassword): void;
    public function deleteAllTokensOfUser(string $email): void;


}
