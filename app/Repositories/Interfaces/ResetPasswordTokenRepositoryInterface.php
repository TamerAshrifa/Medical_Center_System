<?php

namespace App\Repositories\Interfaces;

interface ResetPasswordTokenRepositoryInterface extends RepositoryInterface
{
    public function find(string $email);
    public function delete(string $email): bool;
}
