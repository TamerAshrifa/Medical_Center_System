<?php

namespace App\Repositories\Interfaces;

use App\DTOs\User\UserDTOUpdate;
use App\Enums\UserRoleEnum;
use App\GeneralClasses\Response;
use App\Models\User;
use App\DTOs\User\UserDTO;


interface UserRepositoryInterface extends RepositoryInterface
{

    public function create(
        UserDTO $dtoUser,
        $email_verified_at = null
    ): User;
    public function findByEmailOrUsername(string $email_or_username, $failIfNotExist = true): User|null;
    public function findByEmail(string $email, $failIfNotExist = true): User|null;
    public function findById(int $id, $failIfNotExist = true): User|null;
    public function findByIdWithRoleObject(int $id, UserRoleEnum $role, $failIfNotExist = true): User|null;
    public function resetPassword(string $email, string $newPassword): bool;
    public function deleteAllTokens(string $email): bool;
    public function deleteById(int $id): bool;
    public function logout(int $id): bool;
    public function paginate(int $per_page = 10);
    public function deleteByObject(User $user): bool;
    public function update(int $id, UserDTOUpdate $userDTO): Response;
}