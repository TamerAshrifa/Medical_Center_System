<?php

namespace App\Repositories\Interfaces;

use App\DTOs\Visit\VisitDTO;
use App\DTOs\Visit\VisitDTOUpdate;
use App\Models\Visit;

interface VisitRepositoryInterface extends RepositoryInterface
{
    public function paginate(int $perPage = 10);
    public function paginatePatientVisits(int $perPage = 10, int $patientId);
    public function paginateDoctorVisits(int $perPage = 10, int $doctorId);
    public function find($failIfNotExists = true, bool $withAppointment, int $id): Visit|null;
    public function create(VisitDTO $dto): Visit;
    public function update(VisitDTOUpdate $dto, int $id): bool;

}
