<?php

namespace App\Repositories;

use App\Enums\UserRoleEnum;
use App\Models\Admin;
use App\Repositories\Interfaces\AdminRepositoryInterface;

class AdminRepository extends Repository implements AdminRepositoryInterface
{
    public function search(string $searchWord)
    {
        return Admin::query()
            ->with('user:id,first_name,last_name')
            ->whereHas('user', function ($q) use ($searchWord) {
                $q->where('role', UserRoleEnum::ADMIN->value)
                    ->where('first_name', 'LIKE', "%$searchWord%");
            })
            ->get();
    }

    public function add(int $added_by_admin_id, int $user_id): Admin
    {
        return Admin::create([
            'user_id' => $user_id,
            'added_by_admin_id' => $added_by_admin_id,
        ]);
    }
    public function unactive(int $id): bool
    {
        return Admin::where('id', $id)->update(['is_active' => false]) > 0;
    }
}