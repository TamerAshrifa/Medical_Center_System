<?php

namespace App\Repositories;

use App\DTOs\MedicalRecordAccess\MedicalRecordAccessDTO;
use App\Models\MedicalRecordAccess;
use App\Repositories\Interfaces\MedicalRecordAccessRepositoryInterface;

class MedicalRecordAccessRepository extends Repository implements MedicalRecordAccessRepositoryInterface
{
    public function paginatePatientMedicalRecordAccesses(int $perPage = 10, bool $withUnactive = true, int $patientId)
    {

        return MedicalRecordAccess::
            where('patient_id', $patientId)
            ->when(!$withUnactive, fn($q) => $q->whereNot('is_active', false))
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }
    public function paginateDoctorMedicalRecordAccesses(int $perPage = 10, bool $withUnactive = true, int $doctorId)
    {
        return MedicalRecordAccess::
            where('can_accessed_by_doctor_id', $doctorId)
            ->when(!$withUnactive, fn($q) => $q->whereNot('is_active', false))
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }

    public function paginateVisitMedicalRecordAccesses(int $perPage = 10, bool $withUnactive = true, int $visitId)
    {
        return MedicalRecordAccess::query()
            ->where('visit_id', $visitId)
            ->when(!$withUnactive, fn($q) => $q->whereNot('is_active', false))
            ->orderByDesc('created_at')
            ->paginate($perPage);
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
            $includedEntities[] = 'visit:id,actual_time';

        if ($withPatient)
            $includedEntities = array_merge($includedEntities, [
                'patient:id,user_id',
                'patient.user:id,first_name,last_name',
            ]);
        if ($withDoctor)
            $includedEntities = array_merge($includedEntities, [
                'doctor:id,user_id',
                'doctor.user:id,first_name,last_name',
            ]);

        $query = MedicalRecordAccess::query()
            ->when(!$withUnactive, fn($q) => $q->whereNot('is_active', false))
            ->when(!empty($includedEntities), fn($q) => $q->with($includedEntities));
        return $failIfNotExists ? $query->findOrFail($id) : $query->find($id);
    }
    public function create(MedicalRecordAccessDTO $dto): MedicalRecordAccess
    {
        return MedicalRecordAccess::create($dto->toArray());
    }
    public function unactive(int $id): bool
    {
        return MedicalRecordAccess::findOrFail($id)->update(['is_active' => false]);
    }

    public function exists(int $visitId, int $patientId, int $canAccessedByDoctorId): bool
    {
        return MedicalRecordAccess::query()
            ->where('visit_id', $visitId)
            ->where('patient_id', $patientId)
            ->where('can_accessed_by_doctor_id', $canAccessedByDoctorId)
            ->where('is_active', true)
            ->exists();
    }
    public function hasAccess(int $visitId, int $doctorId): bool
    {
        return MedicalRecordAccess::query()
            ->where('visit_id', $visitId)
            ->where('can_accessed_by_doctor_id', $doctorId)
            ->where('is_active', true)
            ->exists();
    }

}
