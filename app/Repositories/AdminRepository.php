<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository extends Repository
{
    public function getAdminFullname(int $adminId): string
    {
        $query = Admin::query()
            ->join('users', 'admins.user_id', '=', 'users.id')
            ->where('admins.id', $adminId)
            ->select([
                'users.first_name',
                'users.last_name',
            ])->first();
        return $query->first_name . ' ' . $query->last_name;
    }
}