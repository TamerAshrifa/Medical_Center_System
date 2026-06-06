<?php

namespace App\Repositories;

use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Repositories\Interfaces\ResetPasswordTokenRepositoryInterface;
use DB;

class ResetPasswordTokenRepository extends Repository implements ResetPasswordTokenRepositoryInterface
{

    public function findByEmail(string $email): Response
    {
        return $this->executeCode(function () use ($email) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                DB::table('password_reset_tokens')->where('email', $email)->first(),
            );
        });
    }

    public function delete(string $email): Response
    {
        return $this->executeCode(function () use ($email) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                DB::table('password_reset_tokens')->where('email', $email)->delete(),
                204,
            );
        }, true, true);
    }


}