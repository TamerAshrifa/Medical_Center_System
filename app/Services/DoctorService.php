<?php

namespace App\Services;

use App\DTOs\Doctor\DoctorDTO;
use App\DTOs\Doctor\DoctorDTOUpdate;
use App\Enums\UserRoleEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Http\Resources\DoctorToAdminResource;
use App\Http\Resources\DoctorToDoctorResource;
use App\Http\Resources\DoctorToPatientResource;
use App\Models\Room;
use App\Models\User;
use App\Repositories\Interfaces\DoctorRepositoryInterface;
use DB;

class DoctorService extends Service
{
    public function __construct(protected DoctorRepositoryInterface $doctorRepository)
    {
    }

    private function fillIncludedEntities(bool &$isWithRoom, bool &$isWithAdderAdmin): void
    {
        switch ($this->getCurrentUserRole()) {
            case UserRoleEnum::ADMIN:
                $isWithRoom = $isWithAdderAdmin = true;
                break;
            case UserRoleEnum::PATIENT:
                $isWithRoom = $isWithAdderAdmin = false;
                break;
            case UserRoleEnum::DOCTOR:
                $isWithRoom = true;
                $isWithAdderAdmin = false;
                break;
        }
    }
    private function getDoctorResource(&$doctorOrCollectionOfIt, bool $isCollection)
    {
        switch ($this->getCurrentUserRole()) {
            case UserRoleEnum::ADMIN:
                if ($isCollection)
                    return DoctorToAdminResource::collection($doctorOrCollectionOfIt);
                return new DoctorToAdminResource($doctorOrCollectionOfIt);
            case UserRoleEnum::PATIENT:
                if ($isCollection)
                    return DoctorToPatientResource::collection($doctorOrCollectionOfIt);
                return new DoctorToPatientResource($doctorOrCollectionOfIt);
            case UserRoleEnum::DOCTOR:
                if ($isCollection)
                    return DoctorToDoctorResource::collection($doctorOrCollectionOfIt);
                return new DoctorToDoctorResource($doctorOrCollectionOfIt);
        }
    }
    public function getAllDoctorsPaged(int $per_page = 10): Response
    {
        $isWithRoom = $isWithAdderAdmin = false;
        $this->fillIncludedEntities($isWithRoom, $isWithAdderAdmin);
        $response = $this->doctorRepository->getAllDoctorsPaged($per_page, $isWithRoom, $isWithAdderAdmin);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $doctors = $response->data;
        $items = $doctors->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                'result' => 'Success',
                'current_page_number' => $doctors->currentPage(),
                'last_page_number' => $doctors->lastPage(),
                'doctors_per_page' => $doctors->perPage(),
                'next_page_url' => $doctors->nextPageUrl(),
                'previous_page_url' => $doctors->previousPageUrl(),
                'first_page_url' => $doctors->url(1),
                'last_page_url' => $doctors->url($doctors->lastPage()),
                'total_doctors_number' => $doctors->total(),
            ],
            $this->getDoctorResource($items, true),
        );
    }
    public function addNewDoctor(DoctorDTO $doctorDTO): Response
    {
        $user = User::find($doctorDTO->user_id);
        if ($user->role != null)
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('User is already a ' . $user->role->value . ', it can\'t be modified'),
                null,
                409
            );

        $response = new Response(ResponseStatusEnum::FAIL, null, null, 400);
        DB::transaction(
            function () use ($user, &$response, $doctorDTO) {
                $user->role = UserRoleEnum::DOCTOR;
                $user->save();
                $response = $this->doctorRepository->addNewDoctor($doctorDTO->toArray());
            }
        );
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $addedDoctor = $response->data;

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Doctor added successfully'),
            $this->getDoctorResource($addedDoctor, false),
            201
        );
    }
    public function showDoctor(int $doctorId): Response
    {
        $isWithRoom = $isWithAdderAdmin = false;
        $this->fillIncludedEntities($isWithRoom, $isWithAdderAdmin);
        $response = $this->doctorRepository->getDoctorById($doctorId, $isWithRoom, $isWithAdderAdmin);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $doctor = $response->data;
        if ($doctor == null) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Doctor not found'),
                null,
                404
            );
        }

        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->getDoctorResource($doctor, false),
        );
    }
    public function updateDoctor(DoctorDTOUpdate $doctorDTO, int $doctorId): Response
    {
        $response = $this->doctorRepository->getDoctorById($doctorId);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $doctor = $response->data;
        if ($doctor == null) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Doctor not found'),
                null,
                404
            );
        }

        $doctorArray = $doctorDTO->toArray();

        $doctor->fill($doctorArray);
        if (!$doctor->isDirty()) {
            return new Response(
                ResponseStatusEnum::NOTHING,
                Response::messageToArray('No changes detected'),
            );
        }

        $doctor->save();

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Doctor updated successfully'),
            $this->getDoctorResource($doctor, false),
        );
    }
    public function deleteDoctor(int $doctorId): Response
    {
        $response = $this->doctorRepository->getDoctorById($doctorId);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $doctor = $response->data;
        if ($doctor == null) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Doctor not found'),
                null,
                404
            );
        }

        $response = $this->doctorRepository->deleteDoctor($doctor);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        return new Response(ResponseStatusEnum::SUCCESS, null, null, 204);
    }

}