<?php

namespace App\Services;

use App\DTOs\PatientComplaint\PatientComplaintDTO;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Repositories\Interfaces\PatientComplaintRepositoryInterface;

class PatientComplaintService extends Service
{
    public function __construct(
        protected PatientComplaintRepositoryInterface $patientComplaintRepository,
    ) {
    }

    public function allPatientComplaints(int $patient_id): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->patientComplaintRepository->allPatientComplaints($patient_id),
        );
    }
    public function paginate(int $per_page = 10, bool $withReviewed): Response
    {
        $records = $this->patientComplaintRepository->paginate($per_page, $withReviewed);
        $items = $records->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            $this->getPaginationMessage($records),
            $items
        );
    }

    public function find(int $id): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->patientComplaintRepository->find(true, $id),
        );
    }


    public function create(PatientComplaintDTO $dto): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Complaint was made successfully, you will be notified when the admins reply to you'),
            $this->patientComplaintRepository->create($dto),
            201
        );
    }
    public function makePatientComplaintReviewed(string $reply, int $reviewed_by_admin_id, int $id): Response
    {
        if ($this->patientComplaintRepository->isReviewed($id)) {

            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Complaint was already made reviewed'),
                null,
                409
            );
        }
        $this->patientComplaintRepository->makePatientComplaintReviewed($reply, $reviewed_by_admin_id, $id);

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Complaint was made reviewed successfully'),
        );
    }
}
