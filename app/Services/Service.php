<?php

namespace App\Services;

abstract class Service
{
    protected $perPage;
    public function __construct(
    ) {
        $this->perPage = 10;
    }

    protected function paginationMessage($paginationRecords): array
    {
        return [
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