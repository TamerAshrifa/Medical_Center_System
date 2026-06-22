<?php

namespace App\Repositories\Interfaces;

use App\DTOs\Visit\VisitDTO;
use App\DTOs\Visit\VisitDTOUpdate;
use App\Models\Visit;

interface VisitRepositoryInterface extends RepositoryInterface
{
    public function paginate(int $per_page = 10);
    public function paginatePatientVisits(int $per_page = 10, int $patient_id);
    public function paginateDoctorVisits(int $per_page = 10, int $doctor_id);
    public function find($failIfNotExists = true, bool $withAppointment, int $id): Visit|null;
    public function create(VisitDTO $dtoData): Visit;
    public function updateVisit(VisitDTOUpdate $dtoData, int $id): bool;
}
