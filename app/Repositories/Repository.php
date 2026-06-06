<?php

namespace App\Repositories;

use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Repositories\Interfaces\RepositoryInterface;
use Closure;
use DB;
use Illuminate\Database\QueryException;

class Repository implements RepositoryInterface
{
    private function getQueryExceptionResponse(QueryException $e): Response
    {
        return new Response(
            ResponseStatusEnum::FAIL,
            [
                'base_message' => 'Cannot delete this entity because it is referenced by existing entities',
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'details' => ($e->getPrevious() != null) ? $e->getPrevious()->getMessage() : null,
            ],
            null,
            409
        );
    }
    private function getThrowableResponse(\Throwable $e): Response
    {
        return new Response(
            ResponseStatusEnum::FAIL,
            [
                'base_message' => 'Unexpected back-end repository error!',
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'details' => ($e->getPrevious() != null) ? $e->getPrevious()->getMessage() : null,
            ],
            null,
            500
        );
    }

    public function executeCode(
        Closure $callback,
        bool $handleQueryException = false,
        bool $doTransaction = false,
    ): Response {
        try {
            if ($doTransaction)
                return DB::transaction(fn() => $callback());
            else
                return $callback();
        } catch (QueryException $e) {
            if ($handleQueryException)
                return $this->getQueryExceptionResponse($e);
            throw $e;
        } catch (\Throwable $e) {
            return $this->getThrowableResponse($e);
        }
    }
}