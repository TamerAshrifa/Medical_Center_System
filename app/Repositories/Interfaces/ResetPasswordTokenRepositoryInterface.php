<?php

namespace App\Repositories\Interfaces;

interface ResetPasswordTokenRepositoryInterface
{
    public function findByEmail(string $email);
    public function delete(string $email): int;
}
