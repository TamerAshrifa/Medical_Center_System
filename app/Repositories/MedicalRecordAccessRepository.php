<?php

namespace App\Repositories;

use App\DTOs\MedicalRecordAccess\MedicalRecordAccessDTO;
use App\Models\MedicalRecordAccess;
use App\Repositories\Interfaces\MedicalRecordAccessRepositoryInterface;

class MedicalRecordAccessRepository extends Repository implements MedicalRecordAccessRepositoryInterface
{
    public function paginatePatientMedicalRecordAccesses(int $per_page = 10, bool $withUnactive = true, int $patient_id)
    {
        return MedicalRecordAccess::
            where('patient_id', $patient_id)
            ->when(!$withUnactive, fn($q) => $q->whereNot('is_active', false))
            ->orderByDesc('created_at')
            ->paginate($per_page);
    }
    public function paginateDoctorMedicalRecordAccesses(int $per_page = 10, bool $withUnactive = true, int $doctor_id)
    {
        return MedicalRecordAccess::
            where('can_accessed_by_doctor_id', $doctor_id)
            ->when(!$withUnactive, fn($q) => $q->whereNot('is_active', false))
            ->orderByDesc('created_at')
            ->paginate($per_page);
    }

    public function paginateVisitMedicalRecordAccesses(int $per_page = 10, bool $withUnactive = true, int $visit_id)
    {
        return MedicalRecordAccess::
            where('visit_id', $visit_id)
            ->when(!$withUnactive, fn($q) => $q->whereNot('is_active', false))
            ->orderByDesc('created_at')
            ->paginate($per_page);
    }


    public function find(
        $failIfNotExists = true,
        bool $withUnactive = true,
        bool $withVisit = false,
        bool $withPatient = false,
        bool $withDoctor = false,
        int $id
    ): MedicalRecordAccess|null {
        $includedEntities = [];
        if ($withVisit)
            $includedEntities[] = 'visit';
        if ($withPatient)
            $includedEntities[] = 'patient';
        if ($withDoctor)
            $includedEntities[] = 'doctor';

        $query = MedicalRecordAccess::query()
            ->when(!$withUnactive, fn($q) => $q->whereNot('is_active', false))
            ->when(!empty($includedEntities), fn($q) => $q->with($includedEntities));
        return $failIfNotExists ? $query->findOrFail($id) : $query->find($id);
    }
    public function create(MedicalRecordAccessDTO $dtoData): MedicalRecordAccess
    {
        return MedicalRecordAccess::create($dtoData->toArray());
    }
    public function unactive(int $id): bool
    {
        return MedicalRecordAccess::findOrFail($id)->update(['is_active' => false]);
    }

    public function exists(int $visit_id, int $patient_id, int $can_accessed_by_doctor_id): bool
    {
        return MedicalRecordAccess::
            where('visit_id', $visit_id)
            ->where('patient_id', $patient_id)
            ->where('can_accessed_by_doctor_id', $can_accessed_by_doctor_id)
            ->where('is_active', true)
            ->exists();
    }
    public function hasAccess(int $visit_id, int $doctor_id): bool
    {
        return MedicalRecordAccess::
            where('visit_id', $visit_id)
            ->where('can_accessed_by_doctor_id', $doctor_id)
            ->where('is_active', true)
            ->exists();
    }

}
