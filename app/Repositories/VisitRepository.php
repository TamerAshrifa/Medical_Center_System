<?php

namespace App\Repositories;

use App\DTOs\Visit\VisitDTO;
use App\DTOs\Visit\VisitDTOUpdate;
use App\Models\Visit;
use App\Repositories\Interfaces\VisitRepositoryInterface;

class VisitRepository extends Repository implements VisitRepositoryInterface
{
    public function paginate(int $per_page = 10)
    {
        return Visit::
            with(['appointment'])
            ->orderByDesc('created_at')
            ->paginate($per_page);
    }
    public function paginatePatientVisits(int $per_page = 10, int $patient_id)
    {
        return Visit::
            whereHas('appointment', fn($q) => $q->where('patient_id', $patient_id))
            ->with(['appointment'])
            ->orderByDesc('created_at')
            ->paginate($per_page);
    }
    public function paginateDoctorVisits(int $per_page = 10, int $doctor_id)
    {
        return Visit::
            whereHas('appointment', fn($q) => $q->where('doctor_id', $doctor_id))
            ->with(['appointment'])
            ->orderByDesc('created_at')
            ->paginate($per_page);
    }
    public function find($failIfNotExists = true, bool $withAppointment, int $id): Visit|null
    {
        $query = Visit::query()
            ->when($withAppointment, fn($q) => $q->with(['appointment']));
        return $failIfNotExists ? $query->findOrFail($id) : $query->find($id);
    }
    public function create(VisitDTO $dtoData): Visit
    {
        return Visit::create($dtoData->toArray());
    }
    public function update(VisitDTOUpdate $dtoData, int $id): bool
    {
        return Visit::findOrFail($id)->update($dtoData->toArray());
    }
    public function exists(int $appointment_id): bool
    {
        return Visit::where('appointment_id', $appointment_id)->exists();
    }

}
