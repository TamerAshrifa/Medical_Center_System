<?php

namespace App\Repositories\Interfaces;

use App\DTOs\MedicalRecordAccess\MedicalRecordAccessDTO;
use App\DTOs\Visit\VisitDTOUpdate;
use App\Models\MedicalRecordAccess;

interface MedicalRecordAccessRepositoryInterface extends RepositoryInterface
{
    public function paginatePatientMedicalRecordAccesses(int $per_page = 10, bool $withUnactive = true, int $patient_id);
    public function paginateDoctorMedicalRecordAccesses(int $per_page = 10, bool $withUnactive = true, int $doctor_id);
    public function paginateVisitMedicalRecordAccesses(int $per_page = 10, bool $withUnactive = true, int $visit_id);

    public function find(
        $failIfNotExists = true,
        bool $withUnactive = true,
        bool $withVisit = false,
        bool $withPatient = false,
        bool $withDoctor = false,
        int $id
    ): MedicalRecordAccess|null;
    public function create(MedicalRecordAccessDTO $dtoData): MedicalRecordAccess;
    public function unactive(int $id): bool;
    public function exists(int $visit_id, int $patient_id, int $can_accessed_by_doctor_id): bool;
    public function hasAccess(int $visit_id, int $doctor_id): bool;

}
