<?php

namespace App\Repositories\Interfaces;

use App\Models\Admin;

interface AdminRepositoryInterface extends RepositoryInterface
{
    public function search(string $searchWord);
    public function add(int $added_by_admin_id, int $user_id): Admin;
    public function unactive(int $id): bool;
    public function activate(int $id): bool;
    public function monthlyReport(string $dateOfMonth): array;

}
