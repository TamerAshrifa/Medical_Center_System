<?php

namespace App\Repositories\Interfaces;

use App\Models\Patient;

interface PatientRepositoryInterface extends RepositoryInterface
{
    public function add(array $patientData): Patient;
    public function paginate(int $perPage = 10);
    public function findWithUser(int $id, bool $failIfNotExists = true): Patient;
    public function find(int $id, bool $failIfNotExists = true): Patient;
    public function delete(Patient $patient): bool;
    public function search(string $searchWord);

}
