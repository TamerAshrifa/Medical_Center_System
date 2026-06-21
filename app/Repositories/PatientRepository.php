<?php

namespace App\Repositories;

use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Models\Patient;
use App\Repositories\Interfaces\PatientRepositoryInterface;
use DB;
use Storage;

class PatientRepository extends Repository implements PatientRepositoryInterface
{
    public function addNewPatient(array $patientData): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            Patient::create($patientData),
            201
        );
    }
    public function getAllPatientsPaged(int $per_page = 10): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            Patient::with(['user', 'bloodType'])->orderBy('created_at', 'desc')->paginate($per_page),
        );
    }
    public function getPatientByIdWithUser(int $patientId): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            Patient::with('user')->find($patientId)
        );
    }
    public function getPatientById(int $patientId): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            Patient::find($patientId)
        );
    }
    public function deletePatient(Patient $patient): Response
    {
        $user = $patient->user;
        try {
            return DB::transaction(function () use ($patient, $user) {
                if (!$patient->delete() || !((new UserRepository())->deleteByObject($user)))
                    throw new \LogicException('Field to delete patient, please try again');
                return new Response(ResponseStatusEnum::SUCCESS, null, null, 204);
            });
        } catch (\LogicException $e) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray($e->getMessage()),
                null,
                400
            );
        }
    }

}