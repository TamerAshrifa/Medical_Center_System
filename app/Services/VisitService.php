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
        parent::__construct();
    }
    public function paginate(): Response
    {
        $records = $this->visitRepositoryInterface->paginate($this->perPage);

        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function paginateDoctorVisits(int $doctorId): Response
    {
        $records = $this->visitRepositoryInterface->paginateDoctorVisits($this->perPage, $doctorId);

        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function paginatePatientVisits(int $patientId): Response
    {
        $records = $this->visitRepositoryInterface->paginatePatientVisits($this->perPage, $patientId);

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
