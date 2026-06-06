<?php

namespace App\Repositories;

use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Models\Patient;
use App\Repositories\Interfaces\PatientRepositoryInterface;
use Illuminate\Database\QueryException;

class PatientRepository extends Repository implements PatientRepositoryInterface
{
    public function addNewPatient(array $patientData): Response
    {
        return $this->executeCode(function () use (&$patientData) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Patient::create($patientData),
                201
            );
        });
    }
    public function getAllPatientsPaged(int $per_page = 10): Response
    {
        return $this->executeCode(function () use ($per_page) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Patient::with(['user', 'bloodType'])->orderBy('created_at', 'desc')->paginate($per_page),
            );
        });
    }
    public function getPatientByIdWithUser(int $patientId): Response
    {
        return $this->executeCode(function () use ($patientId) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Patient::with('user')->find($patientId)
            );
        });
    }
    public function getPatientById(int $patientId): Response
    {
        return $this->executeCode(function () use ($patientId) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Patient::find($patientId)
            );
        });
    }
    public function deletePatient(Patient $patient): Response
    {
        return $this->executeCode(function () use ($patient) {
            $patient->delete();
            return new Response(ResponseStatusEnum::SUCCESS, null, null, 204);
        }, true, true);
    }

}