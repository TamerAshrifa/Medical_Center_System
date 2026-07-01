<?php

namespace App\Services;

use App\DTOs\MedicalRecordAccess\MedicalRecordAccessDTO;

use App\GeneralClasses\Response;
use App\Models\MedicalRecordAccess;
use App\Models\Visit;
use App\Repositories\Interfaces\MedicalRecordAccessRepositoryInterface;

class MedicalRecordAccessService extends Service
{
    public function __construct(
        protected MedicalRecordAccessRepositoryInterface $medicalRecordAccessRepository,
    ) {
    }
    public function paginateDoctorMedicalRecordAccesses(int $perPage = 10, bool $withUnactive, int $doctorId): Response
    {
        $records = $this->medicalRecordAccessRepository->paginateDoctorMedicalRecordAccesses($perPage, $withUnactive, $doctorId);
        $items = $records->items();
        return new Response(
            true,
            $this->paginationMessage($records),
            $items
        );
    }
    public function paginatePatientMedicalRecordAccesses(int $perPage = 10, bool $withUnactive, int $patientId): Response
    {
        $records = $this->medicalRecordAccessRepository->paginatePatientMedicalRecordAccesses($perPage, $withUnactive, $patientId);
        $items = $records->items();
        return new Response(
            true,
            $this->paginationMessage($records),
            $items
        );
    }
    public function paginateVisitMedicalRecordAccesses(int $perPage = 10, bool $withUnactive, int $visitId): Response
    {
        $records = $this->medicalRecordAccessRepository->paginateVisitMedicalRecordAccesses($perPage, $withUnactive, $visitId);
        $items = $records->items();
        return new Response(
            true,
            $this->paginationMessage($records),
            $items
        );
    }
    public function create(MedicalRecordAccessDTO $dto): Response
    {
        if ($this->medicalRecordAccessRepository->exists($dto->visit_id, $dto->patient_id, $dto->can_accessed_by_doctor_id)) {
            return new Response(
                true,
                Response::messageToArray('This access permission was already granted'),
            );
        }
        $this->medicalRecordAccessRepository->create($dto);
        return new Response(
            true,
            Response::messageToArray('Permission was granted successfully'),
        );
    }
    public function unactive(int $id): Response
    {
        $medicalRecordAccess = MedicalRecordAccess::where('id', $id)->firstOrFail(['can_accessed_by_doctor_id', 'visit_id']);
        $accessedDoctorId = $medicalRecordAccess->can_accessed_by_doctor_id;
        $makerDoctorId = Visit::findOrFail($medicalRecordAccess->visit_id)->appointment->doctor_id;

        if ($accessedDoctorId == $makerDoctorId) {
            return new Response(
                false,
                Response::messageToArray('Permission can\'t be revoked from the treating doctor of the visit'),
                null,
                409
            );
        }

        $wasUnactivated = $this->medicalRecordAccessRepository->unactive($id);
        if (!$wasUnactivated) {
            return new Response(
                false,
                Response::messageToArray('Permission wasn\'t revoked, please try again'),
                null,
                500
            );
        }

        return new Response(
            true,
            Response::messageToArray('Permission was revoked successfully'),
        );
    }
}
