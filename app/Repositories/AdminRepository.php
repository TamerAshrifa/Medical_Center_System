<?php

namespace App\Repositories;

use App\Enums\UserRoleEnum;
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
    public function monthlyReport(string $dateOfMonth): array
    {
        $dDateOfMonth = Carbon::parse($dateOfMonth);
        $dDateOfMonth->startOfMonth();
        $start = $dDateOfMonth->copy();
        $dDateOfMonth->endOfMonth();
        $end = $dDateOfMonth->copy();

        return [
            'new_patients_count' => Patient::whereBetween('created_at', [$start, $end])->count(),
            'appointments_count' => $appointmentsCount = Appointment::whereBetween('datetime', [$start, $end])->count(),
            'visits_count' => $visitsCount = Visit::whereBetween('actual_time', [$start, $end])->count(),
            'visits_to_appointments_rate' => $appointmentsCount > 0 ? ($visitsCount / $appointmentsCount) * 100 . '%' : '0%',
            'peak_hours' => Appointment::selectRaw('HOUR(datetime) as hour, COUNT(*) as total_appointments_at_that_hour')
                ->whereBetween('datetime', [$start, $end])
                ->groupBy('hour')
                ->orderByDesc('total_appointments_at_that_hour')
                ->limit(3)
                ->get(),
            'busy_days' => Appointment::selectRaw('DATE(datetime) as day, COUNT(*) as total_appointments_at_that_day')
                ->whereBetween('datetime', [$start, $end])
                ->groupBy('day')
                ->orderByDesc('total_appointments_at_that_day')
                ->limit(3)
                ->get(),
            'transfers_count' => Transfer::whereBetween('created_at', [$start, $end])->count(),
            'complaints_count' => PatientComplaint::whereBetween('created_at', [$start, $end])->count(),
        ];
    }


}


/*
   'appointments_per_doctor' => $appointmentsPerDoctor =
                Appointment::query()
                    ->select([
                        'appointments.doctor_id',
                        'users.first_name as doctor_first_name',
                        'users.last_name as doctor_last_name'
                    ])
                    ->selectRaw('COUNT(*) as total')
                    ->whereBetween('appointments.datetime', [$start, $end])
                    ->groupBy('appointments.doctor_id', 'users.first_name', 'users.last_name')
                    //  ->groupBy('appointments.doctor_id')
                    ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
                    ->join('users', 'doctors.user_id', '=', 'users.id')

                    ->get(),

*/