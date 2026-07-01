<?php

namespace App\Repositories;

use App\DTOs\Visit\VisitDTO;
use App\DTOs\Visit\VisitDTOUpdate;
use App\Models\Visit;
use App\Repositories\Interfaces\VisitRepositoryInterface;

class VisitRepository extends Repository implements VisitRepositoryInterface
{
    public function paginate(int $perPage = 10)
    {
        return Visit::
            with([
                'appointment.patient:id,user_id',
                'appointment.patient.user:id,first_name,last_name',
                'appointment.doctor:id,user_id',
                'appointment.doctor.user:id,first_name,last_name',
            ])
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }
    public function paginatePatientVisits(int $perPage = 10, int $patientId)
    {
        return Visit::
            whereHas('appointment', fn($q) => $q->where('patient_id', $patientId))
            ->with([
                'appointment.doctor:id,user_id',
                'appointment.doctor.user:id,first_name,last_name',
            ])
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }
    public function paginateDoctorVisits(int $perPage = 10, int $doctorId)
    {
        return Visit::
            whereHas('appointment', fn($q) => $q->where('doctor_id', $doctorId))
            ->with([
                'appointment.patient:id,user_id',
                'appointment.patient.user:id,first_name,last_name',
            ])
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }
    public function find($failIfNotExists = true, bool $withAppointment, int $id): Visit|null
    {
        $query = Visit::query()
            ->when($withAppointment, fn($q) => $q->with([
                'appointment.patient:id,user_id',
                'appointment.patient.user:id,first_name,last_name',
                'appointment.doctor:id,user_id',
                'appointment.doctor.user:id,first_name,last_name',
            ]));
        return $failIfNotExists ? $query->findOrFail($id) : $query->find($id);
    }
    public function create(VisitDTO $dto): Visit
    {
        return Visit::create($dto->toArray());
    }
    public function update(VisitDTOUpdate $dto, int $id): bool
    {
        return Visit::findOrFail($id)->update($dto->toArray());
    }
}
