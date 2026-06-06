<?php

namespace App\Repositories\Interfaces;

use App\GeneralClasses\Response;
use Closure;
use Illuminate\Database\QueryException;

interface RepositoryInterface
{
    public function executeCode(
        Closure $callback,
        bool $handleQueryException = false,
        bool $doTransaction = true,
    ): Response;
}
