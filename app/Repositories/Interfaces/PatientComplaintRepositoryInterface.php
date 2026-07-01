<?php

namespace App\Repositories\Interfaces;

use App\DTOs\PatientComplaint\PatientComplaintDTO;
use App\Models\PatientComplaint;

interface PatientComplaintRepositoryInterface extends RepositoryInterface
{
    public function paginate(int $perPage = 10, bool $withReviewed = true);
    public function allPatientComplaints(int $patientId);
    public function find($failIfNotExists = true, int $id): PatientComplaint|null;
    public function create(PatientComplaintDTO $dto): PatientComplaint;
    public function makePatientComplaintReviewed(string $reply, int $reviewedByAdminId, int $id): bool;
    public function isReviewed(int $id): bool;

}
