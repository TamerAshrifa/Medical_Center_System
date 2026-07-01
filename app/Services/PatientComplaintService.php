<?php

namespace App\Services;

use App\DTOs\PatientComplaint\PatientComplaintDTO;

use App\GeneralClasses\Response;
use App\Repositories\Interfaces\PatientComplaintRepositoryInterface;

class PatientComplaintService extends Service
{
    public function __construct(
        protected PatientComplaintRepositoryInterface $patientComplaintRepository,
    ) {
    }
    public function allPatientComplaints(int $patientId): Response
    {
        return new Response(
            true,
            null,
            $this->patientComplaintRepository->allPatientComplaints($patientId),
        );
    }
    public function paginate(int $perPage = 10, bool $withReviewed): Response
    {
        $records = $this->patientComplaintRepository->paginate($perPage, $withReviewed);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function find(int $id): Response
    {
        return new Response(
            true,
            null,
            $this->patientComplaintRepository->find(true, $id),
        );
    }
    public function create(PatientComplaintDTO $dto): Response
    {
        return new Response(
            true,
            Response::messageToArray('Complaint was made successfully, you will be notified when the admins reply to you'),
            $this->patientComplaintRepository->create($dto),
            201
        );
    }
    public function makeReviewed(string $reply, int $reviewedByAdminId, int $id): Response
    {
        if ($this->patientComplaintRepository->isReviewed($id)) {

            return new Response(
                false,
                Response::messageToArray('Complaint was already made reviewed'),
                null,
                409
            );
        }
        $this->patientComplaintRepository->makePatientComplaintReviewed($reply, $reviewedByAdminId, $id);

        return new Response(
            true,
            Response::messageToArray('Complaint was made reviewed successfully'),
        );
    }
}
