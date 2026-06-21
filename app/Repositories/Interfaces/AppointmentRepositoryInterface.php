<?php

namespace App\Repositories\Interfaces;

use App\DTOs\Appointment\AppointmentDTO;
use App\Enums\AppointmentStatusEnum;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Collection;

interface AppointmentRepositoryInterface extends RepositoryInterface
{
    public function paginate(AppointmentStatusEnum $status = null, bool $with_expired = false, int $per_page = 10);
    public function paginatePatientAppointments(AppointmentStatusEnum $status = null, bool $with_expired = false, int $per_page = 10, int $patientId);
    public function paginateDoctorAppointments(AppointmentStatusEnum $status = null, bool $with_expired = false, int $per_page = 10, int $doctor_id);
    public function find($failIfNotExists = true, bool $withPatient, bool $withDoctor, int $id): Appointment|null;
    function updateAppointmentStatus(AppointmentStatusEnum $status, int $id): bool;
    public function create(AppointmentDTO $dtoData): Appointment;
    public function exists(int $doctorId, string $datetime, AppointmentStatusEnum $status): bool;
    public function getBookedAppointmentsOfDoctorInDate(string $dateOfDay, int $doctorId): Collection;
}
