<?php

namespace App\Repositories;

use App\DTOs\DayWorkTime\DayWorkTimeDTO;
use App\DTOs\WorkScheduleDTO\WorkScheduleDTO;
use App\Enums\AppointmentStatusEnum;
use App\Enums\WorkScheduleTypeEnum;
use App\Models\Appointment;
use App\Models\DayWorkTime;
use App\Models\DoctorWorkSchedule;
use App\Models\MedicalCenterWorkSchedule;
use App\Models\WeekDay;
use App\Models\WorkSchedule;
use Carbon\Carbon;

class AppointmentRepository extends Repository
{
    public function paginateAppointments(AppointmentStatusEnum $status = null, int $per_page = 10, )
    {
        return Appointment::with(['patient', 'doctor'])
            ->when($status, fn($q) => $q->where('status', $status->value))
            ->orderBy('created_at', 'desc')
            ->paginate($per_page);
    }

    public function paginatePatientAppointments(AppointmentStatusEnum $status = null, int $per_page = 10, int $patientId)
    {
        return Appointment::with('doctor')
            ->where('patient_id', $patientId)
            ->when($status, fn($q) => $q->where('status', $status->value))
            ->orderBy('created_at', 'desc')
            ->paginate($per_page);
    }
    public function paginateDoctorAppointments(AppointmentStatusEnum $status = null, int $per_page = 10, int $doctorId)
    {
        return Appointment::with('patient')
            ->where('doctor_id', $doctorId)
            ->when($status, fn($q) => $q->where('status', $status->value))
            ->orderBy('created_at', 'desc')
            ->paginate($per_page);
    }


    public function findAppointment($failIfNotExists = true, bool $withPatient, bool $withDoctor, int $id): Appointment|null
    {
        $entities = [];
        if ($withPatient)
            $entities[] = 'patient';
        if ($withDoctor)
            $entities[] = 'doctor';

        $query = Appointment::with($entities);

        return $failIfNotExists ? $query->findOrFail($id) : $query->find($id);
    }

    public function updateAppointmentStatus(AppointmentStatusEnum $status, int $id): bool
    {
        return $this->findAppointment(true, false, false, $id)->update(['status' => $status->value]) > 0;
    }

    public function createWorkSchedule(WorkScheduleDTO $dtoData): WorkSchedule
    {
        return Appointment::create($dtoData->toArray());
    }



}
