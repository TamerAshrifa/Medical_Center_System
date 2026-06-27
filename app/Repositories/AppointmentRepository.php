<?php

namespace App\Repositories;

use App\DTOs\Appointment\AppointmentDTO;
use App\Enums\AppointmentStatusEnum;
use App\Models\Appointment;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class AppointmentRepository extends Repository implements AppointmentRepositoryInterface
{

    public function paginate(AppointmentStatusEnum $status = null, bool $with_expired = false, int $per_page = 10)
    {
        return Appointment::with(['patient', 'doctor'])
            ->when($status, fn($q) => $q->where('status', $status->value))
            ->when(!$with_expired, fn($q) => $q->where('datetime', '>=', Carbon::today()))
            ->orderBy('created_at', 'desc')
            ->paginate($per_page);
    }
    public function paginatePatientAppointments(AppointmentStatusEnum $status = null, bool $with_expired = false, int $per_page = 10, int $patientId)
    {
        return Appointment::with('doctor')
            ->where('patient_id', $patientId)
            ->when($status, fn($q) => $q->where('status', $status->value))
            ->when(!$with_expired, fn($q) => $q->where('datetime', '>=', Carbon::today()))
            ->orderBy('created_at', 'desc')
            ->paginate($per_page);
    }
    public function paginateDoctorAppointments(AppointmentStatusEnum $status = null, bool $with_expired = false, int $per_page = 10, int $doctor_id)
    {
        return Appointment::with('patient')
            ->where('doctor_id', $doctor_id)
            ->when($status, fn($q) => $q->where('status', $status->value))
            ->when(!$with_expired, fn($q) => $q->where('datetime', '>=', Carbon::today()))
            ->orderBy('created_at', 'desc')
            ->paginate($per_page);
    }
    public function find($failIfNotExists = true, bool $withPatient, bool $withDoctor, int $id): Appointment|null
    {
        $entities = [];
        if ($withPatient)
            $entities[] = 'patient';
        if ($withDoctor)
            $entities[] = 'doctor';

        $query = Appointment::query()->with($entities);

        return $failIfNotExists ? $query->findOrFail($id) : $query->find($id);
    }
    function updateAppointmentStatus(AppointmentStatusEnum $status, int $id): bool
    {
        return $this->find(true, false, false, $id)->update(['status' => $status->value]) > 0;
    }
    public function create(AppointmentDTO $dtoData): Appointment
    {
        return Appointment::create($dtoData->toArray());
    }
    public function exists(int $doctorId, string $datetime, AppointmentStatusEnum $status): bool
    {
        return Appointment::where('doctor_id', $doctorId)
            ->where('datetime', $datetime)
            ->where('status', $status->value)
            ->exists();
    }

    public function isAttended(int $id): bool
    {
        return Appointment::where('id', $id)->whereHas('visit')->exists();
    }
    public function hasTransfer(int $id): bool
    {
        return Appointment::findOrFail($id)->whereHas('transfer')->exists();
    }

    public function getBookedAppointmentsOfDoctorInDate(string $dateOfDay, int $doctorId)
    {
        return Appointment::query()
            ->where('doctor_id', $doctorId)
            ->where('datetime', '>=', $dateOfDay . ' 00:00:00')
            ->where('datetime', '<=', $dateOfDay . ' 23:59:59')
            ->whereNotIn('status', [
                AppointmentStatusEnum::CANCELLED->value,
                AppointmentStatusEnum::CANCELLED_BY_DOCTOR->value,
            ])
            ->get('datetime');
    }

    public function allPendingAppointmentsEmailsInDateRange(string $startDate, string $endDate)
    {
        return Appointment::query()
            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->join('users', 'patients.user_id', '=', 'users.id')
            ->where('appointments.status', AppointmentStatusEnum::PENDING->value)
            ->whereDate('appointments.datetime', '>=', $startDate . ' 00:00:00')
            ->whereDate('appointments.datetime', '<=', $endDate . ' 23:59:59')
            ->distinct()
            ->pluck('users.email');
    }

    public function cancelByMedicalCenterAllPendingAppointmentsEmailsInDateRange(string $startDate, string $endDate)
    {
        return Appointment::query()
            ->where('status', AppointmentStatusEnum::PENDING->value)
            ->whereDate('datetime', '>=', $startDate . ' 00:00:00')
            ->whereDate('datetime', '<=', $endDate . ' 23:59:59')
            ->update(['status' => AppointmentStatusEnum::CANCELLED_BY_MEDICAL_CENTER->value]);
    }

    public function allDoctorPendingAppointmentsEmailsInDateRange(string $startDate, string $endDate, int $doctorId)
    {
        return Appointment::query()
            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->join('users', 'patients.user_id', '=', 'users.id')
            ->where('appointments.doctor_id', $doctorId)
            ->where('appointments.status', AppointmentStatusEnum::PENDING->value)
            ->whereDate('appointments.datetime', '>=', $startDate)
            ->whereDate('appointments.datetime', '<=', $endDate)
            ->distinct()
            ->pluck('users.email');
    }

    public function cancelByDoctorAllDoctorPendingAppointmentsEmailsInDateRange(string $startDate, string $endDate, int $doctorId)
    {
        return Appointment::query()
            ->where('doctor_id', $doctorId)
            ->where('status', AppointmentStatusEnum::PENDING->value)
            ->whereDate('datetime', '>=', $startDate . ' 00:00:00')
            ->whereDate('datetime', '<=', $endDate . ' 23:59:59')
            ->update(['status' => AppointmentStatusEnum::CANCELLED_BY_DOCTOR->value]);
    }

}
