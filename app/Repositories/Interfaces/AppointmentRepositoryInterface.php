<?php

namespace App\Repositories\Interfaces;

use App\DTOs\Appointment\AppointmentDTO;
use App\Enums\AppointmentStatusEnum;
use App\Models\Appointment;

interface AppointmentRepositoryInterface extends RepositoryInterface
{
    public function paginate(AppointmentStatusEnum $status = null, bool $withExpired = false, int $perPage = 10);
    public function paginatePatientAppointments(AppointmentStatusEnum $status = null, bool $withExpired = false, int $perPage = 10, int $patientId);
    public function paginateDoctorAppointments(AppointmentStatusEnum $status = null, bool $withExpired = false, int $perPage = 10, int $doctor_id);
    public function find($failIfNotExists = true, bool $withPatient, bool $withDoctor, int $id): Appointment|null;
    function updateAppointmentStatus(AppointmentStatusEnum $status, int $id): bool;
    public function create(AppointmentDTO $dto): Appointment;
    public function exists(int $doctorId, string $datetime, AppointmentStatusEnum $status): bool;
    public function isAttended(int $id): bool;
    public function getBookedAppointmentsOfDoctorInDate(string $dateOfDay, int $doctorId);
    public function allPendingAppointmentsEmailsInDateRange(string $startDate, string $endDate);
    public function allDoctorPendingAppointmentsEmailsInDateRange(string $startDate, string $endDate, int $doctorId);
    public function cancelByMedicalCenterAllPendingAppointmentsEmailsInDateRange(string $startDate, string $endDate);
    public function cancelByDoctorAllDoctorPendingAppointmentsEmailsInDateRange(string $startDate, string $endDate, int $doctorId);
    public function doctorAppointmentDuration(int $doctorId, bool $failIfDoctorNotExists = true): int;

}
