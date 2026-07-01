<?php

namespace App\Repositories\Interfaces;

use App\DTOs\User\UserDTOUpdate;
use App\Enums\UserRoleEnum;
use App\GeneralClasses\Response;
use App\Models\User;
use App\DTOs\User\UserDTO;


interface UserRepositoryInterface extends RepositoryInterface
{
    public function create(UserDTO $dto, $emailVerifiedAt = null): User;
    public function findByEmailOrUsername(string $emailOrUsername, $failIfNotExist = true): User|null;
    public function findByEmail(string $email, $failIfNotExist = true): User|null;
    public function find(int $id, $failIfNotExist = true): User|null;
    public function resetPassword(string $email, string $newPassword): bool;
    public function deleteAllTokens(string $email): bool;
    public function deleteByObject(User $user): bool;
    public function delete(int $id): bool;
    public function logout(int $id): bool;
    public function paginate(int $perPage = 10);
    public function update(int $id, UserDTOUpdate $dto): bool;

}
