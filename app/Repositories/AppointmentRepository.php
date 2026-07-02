<?php

namespace App\Repositories;

use App\DTOs\Appointment\AppointmentDTO;
use App\Enums\AppointmentStatusEnum;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use Carbon\Carbon;

class AppointmentRepository extends Repository implements AppointmentRepositoryInterface
{
    public function paginate(AppointmentStatusEnum $status = null, bool $withExpired = false, int $perPage = 10)
    {
        return Appointment::query()
            ->with([
                'patient:id,user_id',
                'patient.user:id,first_name,last_name',
                'doctor:id,user_id',
                'doctor.user:id,first_name,last_name',
            ])
            ->when($status, fn($q) => $q->where('status', $status->value))
            ->when(!$withExpired, fn($q) => $q->where('datetime', '>=', Carbon::today()))
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
    public function paginatePatientAppointments(AppointmentStatusEnum $status = null, bool $withExpired = false, int $perPage = 10, int $patientId)
    {
        return Appointment::query()
            ->with([
                'doctor:id,user_id',
                'doctor.user:id,first_name,last_name',
            ])
            ->where('patient_id', $patientId)
            ->when($status, fn($q) => $q->where('status', $status->value))
            ->when(!$withExpired, fn($q) => $q->where('datetime', '>=', Carbon::today()))
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
    public function paginateDoctorAppointments(AppointmentStatusEnum $status = null, bool $withExpired = false, int $perPage = 10, int $doctorId)
    {
        return Appointment::query()
            ->with([
                'patient:id,user_id',
                'patient.user:id,first_name,last_name',
            ])
            ->where('doctor_id', $doctorId)
            ->when($status, fn($q) => $q->where('status', $status->value))
            ->when(!$withExpired, fn($q) => $q->where('datetime', '>=', Carbon::today()))
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
    public function find($failIfNotExists = true, bool $withPatient, bool $withDoctor, int $id): Appointment|null
    {
        $entities = [];
        if ($withPatient)
            $entities = array_merge($entities, [
                'patient:id,user_id',
                'patient.user:id,first_name,last_name',
            ]);

        if ($withDoctor)
            $entities = array_merge($entities, [
                'doctor:id,user_id',
                'doctor.user:id,first_name,last_name',
            ]);

        $query = Appointment::query()->with($entities);

        return $failIfNotExists ? $query->findOrFail($id) : $query->find($id);
    }
    function updateAppointmentStatus(AppointmentStatusEnum $status, int $id): bool
    {
        $updateArray = ['status' => $status->value];
        if (
            $status != AppointmentStatusEnum::PENDING &&
            $status != AppointmentStatusEnum::ATTENDED
        )
            $updateArray = array_merge($updateArray, [
                'active_booking_key' => null,
            ]);

        return $this->find(true, false, false, $id)->update($updateArray) > 0;
    }
    public function create(AppointmentDTO $dto): Appointment
    {
        return Appointment::create(array_merge($dto->toArray(), [
            'active_booking_key' => $dto->doctor_id . ' - ' . $dto->datetime,
        ]));
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
            ->whereDate('appointments.datetime', '>=', $startDate)
            ->whereDate('appointments.datetime', '<=', $endDate)
            ->distinct()
            ->pluck('users.email');
    }

    public function cancelByMedicalCenterAllPendingAppointmentsEmailsInDateRange(string $startDate, string $endDate)
    {
        return Appointment::query()
            ->where('status', AppointmentStatusEnum::PENDING->value)
            ->whereDate('datetime', '>=', $startDate)
            ->whereDate('datetime', '<=', $endDate)
            ->update([
                'status' => AppointmentStatusEnum::CANCELLED_BY_MEDICAL_CENTER->value,
                'active_booking_key' => null,
            ]);
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

    public function cancelByDoctorAllDoctorPendingAppointmentsEmailsInDateRange(
        string $startDate,
        string $endDate,
        int $doctorId
    ) {
        return Appointment::query()
            ->where('doctor_id', $doctorId)
            ->where('status', AppointmentStatusEnum::PENDING->value)
            ->whereDate('datetime', '>=', $startDate)
            ->whereDate('datetime', '<=', $endDate)
            ->update([
                'status' => AppointmentStatusEnum::CANCELLED_BY_DOCTOR->value,
                'active_booking_key' => null,
            ]);
    }
    public function doctorAppointmentDuration(int $doctorId, bool $failIfDoctorNotExists = true): int
    {
        $query = Doctor::query()->where('id', $doctorId);
        return $failIfDoctorNotExists ?
            $query->valueOrFail('appointment_duration') :
            $query->value('appointment_duration');
    }
}
