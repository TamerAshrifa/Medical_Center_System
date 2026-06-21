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
    public function getBookedAppointmentsOfDoctorInDate(string $dateOfDay, int $doctorId): Collection
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
}
