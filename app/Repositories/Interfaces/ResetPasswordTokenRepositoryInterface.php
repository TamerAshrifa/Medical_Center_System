<?php

namespace App\Repositories\Interfaces;

use App\GeneralClasses\Response;

interface ResetPasswordTokenRepositoryInterface extends RepositoryInterface
{
    public function findByEmail(string $email): Response;
    public function delete(string $email): Response;
}
