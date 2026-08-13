<?php

namespace App\Jobs;

use App\Mail\MonthlyReportMail;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\MonthlyReport;
use App\Models\Patient;
use App\Models\PatientComplaint;
use App\Models\Transfer;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class MonthlyReportJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private string $dateOfMonth;
    private int $idOfRequesterAdmin;
    public function __construct(string $dateOfMonth, int $idOfRequesterAdmin)
    {
        $this->dateOfMonth = $dateOfMonth;
        $this->idOfRequesterAdmin = $idOfRequesterAdmin;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $dDateOfMonth = Carbon::parse($this->dateOfMonth);
        $dDateOfMonth->startOfMonth();
        $start = $dDateOfMonth->copy();
        $dDateOfMonth->endOfMonth();
        $end = $dDateOfMonth->copy();
        MonthlyReport::create(
            [
                'made_by_admin_id' => $this->idOfRequesterAdmin,
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
            ]
        );
        $adminEmail = Admin::query()
            ->join('users', 'admins.user_id', '=', 'users.id')
            ->where('admins.id', $this->idOfRequesterAdmin)
            ->valueOrFail('users.email');
        Mail::to($adminEmail)->send(new MonthlyReportMail());
    }
}
