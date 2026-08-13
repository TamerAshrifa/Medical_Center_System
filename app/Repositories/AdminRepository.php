<?php

namespace App\Repositories;

use App\Enums\UserRoleEnum;
use App\Jobs\MonthlyReportJob;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\PatientComplaint;
use App\Models\Transfer;
use App\Models\Visit;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use Carbon\Carbon;

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

    public function activate(int $id): bool
    {
        return Admin::where('id', $id)->update(['is_active' => true]) > 0;
    }
    public function monthlyReport(string $dateOfMonth, int $idOfRequesterAdmin): bool
    {
        MonthlyReportJob::dispatch($dateOfMonth, $idOfRequesterAdmin);
        return true;
    }
}