<?php

namespace App\Repositories\Interfaces;

use App\DTOs\PatientComplaint\PatientComplaintDTO;
use App\Models\PatientComplaint;

interface PatientComplaintRepositoryInterface extends RepositoryInterface
{
    public function paginate(int $per_page = 10, bool $withReviewed = true);
    public function allPatientComplaints(int $patient_id);
    public function find($failIfNotExists = true, int $id): PatientComplaint|null;
    public function create(PatientComplaintDTO $dto): PatientComplaint;
    public function makePatientComplaintReviewed(string $reply, int $reviewed_by_admin_id, int $id): bool;
    public function isReviewed(int $id): bool;

}
