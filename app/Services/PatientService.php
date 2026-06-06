<?php

namespace App\Services;

use App\DTOs\Patient\PatientDTO;
use App\DTOs\Patient\PatientDTOUpdate;
use App\Enums\UserRoleEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Http\Resources\PatientToAdminResource;
use App\Http\Resources\PatientToItselfResource;
use App\Models\User;
use App\Repositories\Interfaces\PatientRepositoryInterface;
use DB;

class PatientService extends Service
{
    public function __construct(
        protected PatientRepositoryInterface $patientRepository,
    ) {
    }

    public function getAllPatientsPaged(int $per_page = 10): Response
    {
        $response = $this->patientRepository->getAllPatientsPaged($per_page);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $patients = $response->data;
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "result" => "Success",
                "current_page_number" => $patients->currentPage(),
                "last_page_number" => $patients->lastPage(),
                "patients_per_page" => $patients->perPage(),
                "next_page_url" => $patients->nextPageUrl(),
                "previous_page_url" => $patients->previousPageUrl(),
                "first_page_url" => $patients->url(1),
                "last_page_url" => $patients->url($patients->lastPage()),
                "total_patients_number" => $patients->total(),
            ],
            PatientToAdminResource::collection($patients->items()),
        );
    }
    public function addNewPatient(PatientDTO $patientDTO): Response
    {
        $user = User::find($patientDTO->user_id);

        $response = new Response(ResponseStatusEnum::FAIL, null, null, 400);
        DB::transaction(
            function () use ($user, &$response, $patientDTO) {
                $user->role = UserRoleEnum::PATIENT;
                $user->save();
                $response = $this->patientRepository->addNewPatient($patientDTO->toArray());
            }
        );
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $addedPatient = $response->data;

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Patient added successfully'),
            $this->getCurrentUserRole() == UserRoleEnum::ADMIN ?
            new PatientToAdminResource($addedPatient) :
            new PatientToItselfResource($addedPatient),
            201
        );
    }
    public function showPatient(int $patientId): Response
    {
        $response = $this->patientRepository->getPatientByIdWithUser($patientId);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $patient = $response->data;
        if ($patient == null) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Patient not found'),
                null,
                404
            );
        }

        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->getCurrentUserRole() === UserRoleEnum::ADMIN ?
            new PatientToAdminResource($patient) :
            new PatientToItselfResource($patient),
        );
    }
    public function updatePatient(PatientDTOUpdate $patientDTO, int $patientId): Response
    {
        $response = $this->patientRepository->getPatientById($patientId);

        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $patient = $response->data;
        if ($patient == null) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('patient not found'),
                null,
                404
            );
        }

        $patientArray = $patientDTO->toArray();
        $patient->fill($patientArray);
        if (!$patient->isDirty()) {
            return new Response(
                ResponseStatusEnum::NOTHING,
                Response::messageToArray('No changes detected'),
            );
        }

        $patient->save();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Patient updated successfully'),
            $this->getCurrentUserRole() === UserRoleEnum::ADMIN ?
            new PatientToAdminResource($patient) :
            new PatientToItselfResource($patient),
        );
    }
    public function deletePatient(int $patientId): Response
    {
        $response = $this->patientRepository->getPatientById($patientId);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $patient = $response->data;
        if ($patient == null) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('patient not found'),
                null,
                404
            );
        }

        $response = $this->patientRepository->deletePatient($patient);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            null,
            204
        );
    }

}