<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ResetPasswordTokenRepositoryInterface;
use DB;

class ResetPasswordTokenRepository implements ResetPasswordTokenRepositoryInterface
{

    public function findByEmail(string $email)
    {
        return DB::table('password_reset_tokens')->where('email', $email)->first();
    }

    public function delete(string $email): int
    {
        return DB::table('password_reset_tokens')->where('email', $email)->delete();
    }


}