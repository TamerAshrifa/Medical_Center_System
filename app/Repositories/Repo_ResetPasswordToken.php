<?php

namespace App\Repositories;

use App\Enums\En_Role;
use App\Models\User;
use App\DTOs\Dto_User;
use App\Repositories\Interfaces\Repo_interface_ResetPasswordToken;
use App\Repositories\Interfaces\Repo_interface_User;
use DB;
use Illuminate\Support\Facades\Hash;

class Repo_ResetPasswordToken implements Repo_interface_ResetPasswordToken
{

    public function findByEmail(string $email): ?object
    {
        return DB::table('password_reset_tokens')->where('email', $email)->first();
    }

    public function delete(string $email): int
    {
        return DB::table('password_reset_tokens')->where('email', $email)->delete();
    }


}