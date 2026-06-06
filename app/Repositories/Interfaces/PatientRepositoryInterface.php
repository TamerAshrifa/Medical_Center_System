<?php

namespace App\Repositories\Interfaces;

use App\GeneralClasses\Response;
use App\Models\Patient;

interface PatientRepositoryInterface extends RepositoryInterface
{
    public function addNewPatient(array $patientData): Response;
    public function getAllPatientsPaged(int $per_page = 10): Response;
    public function getPatientByIdWithUser(int $patientId): Response;
    public function getPatientById(int $patientId): Response;
    public function deletePatient(Patient $patient): Response;
}
