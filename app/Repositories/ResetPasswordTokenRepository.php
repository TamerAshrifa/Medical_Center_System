<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ResetPasswordTokenRepositoryInterface;
use DB;

class ResetPasswordTokenRepository extends Repository implements ResetPasswordTokenRepositoryInterface
{
    public function find(string $email)
    {
        return DB::table('password_reset_tokens')->where('email', $email)->first();
    }

    public function delete(string $email): bool
    {
        return DB::table('password_reset_tokens')->where('email', $email)->delete() > 0;
    }

}