<?php

namespace App\Repositories\Interfaces;

use App\Enums\UserRoleEnum;
use App\GeneralClasses\Response;
use App\Models\User;
use App\DTOs\User\UserDTO;


interface UserRepositoryInterface extends RepositoryInterface
{
    public function create(
        UserDTO $dtoUser,
        $email_verified_at = null
    ): Response;


    public function findByEmailOrUsername(string $email_or_username): Response;
    public function findByEmail(string $email): Response;
    public function resetPassword(string $email, string $newPassword): Response;
    public function deleteAllTokensOfUser(string $email): Response;
    public function delete(int $userId): Response;
    public function logoutUser(User $currentUser): Response;

}
