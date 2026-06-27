<?php

namespace App\Services;

use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\Auth;

abstract class Service
{
    public function __construct(
    ) {
    }

    protected function getCurrentUserRole(): UserRoleEnum|null
    {
        return Auth::user()->role;
    }

    protected function getPaginationMessage($paginationRecords): array
    {
        return [
            'result' => 'Success',
            'current_page_number' => $paginationRecords->currentPage(),
            'last_page_number' => $paginationRecords->lastPage(),
            'items_per_page' => $paginationRecords->perPage(),
            'next_page_url' => $paginationRecords->nextPageUrl(),
            'previous_page_url' => $paginationRecords->previousPageUrl(),
            'first_page_url' => $paginationRecords->url(1),
            'last_page_url' => $paginationRecords->url($paginationRecords->lastPage()),
            'total_items_number' => $paginationRecords->total(),
        ];
    }


}