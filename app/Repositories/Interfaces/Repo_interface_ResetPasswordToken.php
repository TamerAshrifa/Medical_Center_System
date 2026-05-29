<?php

namespace App\Repositories\Interfaces;

use App\Enums\En_Role;
use app\DTOs\Dto_User;
use App\Models\User;


interface Repo_interface_ResetPasswordToken
{
    public function findByEmail(string $email);
    public function delete(string $email): int;


}
