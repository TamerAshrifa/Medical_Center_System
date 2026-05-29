<?php

namespace App\Repositories\Interfaces;

use App\Enums\En_Role;
use app\DTOs\Dto_User;
use App\Models\User;


interface Repo_interface_User
{
    public function create(Dto_User $dtoUser, En_Role $role = En_Role::PATIENT, $email_verified_at = null): User;
    public function findByEmailOrUsername(string $email_or_username): User;
    public function findByEmail(string $email): User;
    public function resetPassword(string $email, string $newPassword): void;
    public function deleteAllTokensOfUser(string $email): void;


}
