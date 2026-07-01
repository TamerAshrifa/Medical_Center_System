<?php

namespace App\Services;

use App\DTOs\Visit\VisitDTOUpdate;

use App\GeneralClasses\Response;
use App\Repositories\Interfaces\VisitRepositoryInterface;

class VisitService extends Service
{
    public function __construct(
        protected VisitRepositoryInterface $visitRepositoryInterface,
    ) {
    }
    public function paginate(int $perPage = 10): Response
    {
        $records = $this->visitRepositoryInterface->paginate($perPage);

        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function paginateDoctorVisits(int $perPage = 10, int $doctorId): Response
    {
        $records = $this->visitRepositoryInterface->paginateDoctorVisits($perPage, $doctorId);

        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function paginatePatientVisits(int $perPage = 10, int $patientId): Response
    {
        $records = $this->visitRepositoryInterface->paginatePatientVisits($perPage, $patientId);

        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function find($failIfNotExists, bool $withAppointment, int $id): Response
    {
        return new Response(
            true,
            null,
            $this->visitRepositoryInterface->find($failIfNotExists, $withAppointment, $id)
        );
    }
    public function update(VisitDTOUpdate $dto, int $id): Response
    {
        $didUpdate = $this->visitRepositoryInterface->update($dto, $id);
        if (!$didUpdate)
            return new Response(
                false,
                Response::messageToArray('Visit wasn\'t updated, please try again'),
            );
        return new Response(
            true,
            Response::messageToArray('Visit updated successfully'),
        );
    }
}
