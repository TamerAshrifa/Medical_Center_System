<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\GeneralClasses\Response;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Http\JsonResponse;

class Controller
{
    public function currentUserRole(): UserRoleEnum|null
    {
        return Auth::user()->role;
    }

    public function jsonResponse(Response $response): JsonResponse
    {
        return response()->json(
            array_filter([
                'did_succeed' => $response->did_succeed,
                'message' => $response->message,
                'data' => $response->data,
            ], fn($value) => !is_null($value)),
            $response->statusCode
        );
    }
}
