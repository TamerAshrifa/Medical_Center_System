<?php

namespace App\Repositories\Interfaces;

use App\DTOs\MedicalRecordAccess\MedicalRecordAccessDTO;
use App\Models\MedicalRecordAccess;

interface MedicalRecordAccessRepositoryInterface extends RepositoryInterface
{
    public function paginatePatientMedicalRecordAccesses(int $perPage = 10, bool $withUnactive = true, int $patientId);
    public function paginateDoctorMedicalRecordAccesses(int $perPage = 10, bool $withUnactive = true, int $doctorId);
    public function paginateVisitMedicalRecordAccesses(int $perPage = 10, bool $withUnactive = true, int $visitId);

    public function find(
        $failIfNotExists = true,
        bool $withUnactive = true,
        bool $withVisit = false,
        bool $withPatient = false,
        bool $withDoctor = false,
        int $id
    ): MedicalRecordAccess|null;
    public function create(MedicalRecordAccessDTO $dto): MedicalRecordAccess;
    public function unactive(int $id): bool;
    public function exists(int $visitId, int $patientId, int $canAccessedByDoctorId): bool;
    public function hasAccess(int $visitId, int $doctorId): bool;

}
