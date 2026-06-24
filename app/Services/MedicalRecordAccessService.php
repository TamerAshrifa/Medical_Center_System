<?php

namespace App\Services;

use App\DTOs\MedicalRecordAccess\MedicalRecordAccessDTO;
use App\GeneralClasses\Enums\ResponseStatusEnum;
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

    public function paginateDoctorMedicalRecordAccesses(int $per_page = 10, bool $withUnactive, int $doctor_id): Response
    {
        $records = $this->medicalRecordAccessRepository->paginateDoctorMedicalRecordAccesses($per_page, $withUnactive, $doctor_id);
        $items = $records->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            $this->getPaginationMessage($records),
            $items
        );
    }
    public function paginatePatientMedicalRecordAccesses(int $per_page = 10, bool $withUnactive, int $patient_id): Response
    {
        $records = $this->medicalRecordAccessRepository->paginatePatientMedicalRecordAccesses($per_page, $withUnactive, $patient_id);
        $items = $records->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            $this->getPaginationMessage($records),
            $items
        );
    }
    public function paginateVisitMedicalRecordAccesses(int $per_page = 10, bool $withUnactive, int $visit_id): Response
    {
        $records = $this->medicalRecordAccessRepository->paginateVisitMedicalRecordAccesses($per_page, $withUnactive, $visit_id);
        $items = $records->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            $this->getPaginationMessage($records),
            $items
        );
    }

    public function create(MedicalRecordAccessDTO $dto): Response
    {
        if ($this->medicalRecordAccessRepository->exists($dto->visit_id, $dto->patient_id, $dto->can_accessed_by_doctor_id)) {
            return new Response(
                ResponseStatusEnum::NOTHING,
                Response::messageToArray('This access permission was already granted'),
            );
        }
        $this->medicalRecordAccessRepository->create($dto);
        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Permission was granted successfully'),
        );
    }
    public function unactive(int $id): Response
    {
        $medicalRecordAccess = MedicalRecordAccess::where('id', $id)->get(['doctor_id', 'visit_id']);
        $accessedDoctorId = $medicalRecordAccess->doctor_id;
        $makerDoctorId = Visit::where('id', $medicalRecordAccess->visit_id)->valueOrFail('doctor_id');

        if ($accessedDoctorId == $makerDoctorId) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Permission can\'t be revoked from the treating doctor of the visit'),
                null,
                409
            );
        }

        $wasUnactivated = $this->medicalRecordAccessRepository->unactive($id);
        if (!$wasUnactivated) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Permission wasn\'t revoked, please try again'),
                null,
                500
            );
        }

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Permission was revoked successfully'),
        );
    }
}
