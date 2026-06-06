<?php

namespace App\Services;

use App\DTOs\Speciality\SpecialityDTO;
use App\DTOs\Speciality\SpecialityDTOUpdate;
use App\Enums\UserRoleEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Http\Resources\SpecialityToAdminResource;
use App\Http\Resources\SpecialityToDoctorResource;
use App\Http\Resources\SpecialityToPatientResource;
use App\Repositories\Interfaces\SpecialityRepositoryInterface;

class SpecialityService extends Service
{
    public function __construct(
        protected SpecialityRepositoryInterface $specialityRepository,
    ) {
    }

    private function fillIncludedEntities(
        UserRoleEnum $role,
        bool &$isWithAdderAdmin,
        bool &$isWithDoctors,
    ): void {
        switch ($role) {
            case UserRoleEnum::ADMIN:
                $isWithAdderAdmin = $isWithDoctors = true;
                break;
            case UserRoleEnum::PATIENT:
                $isWithAdderAdmin = $isWithDoctors = false;
                break;
            case UserRoleEnum::DOCTOR:
                $isWithAdderAdmin = $isWithDoctors = false;
                break;
        }
    }
    private function getSpecialityResource(&$specialityOrCollectionOfIt, bool $isCollection)
    {
        switch ($this->getCurrentUserRole()) {
            case UserRoleEnum::ADMIN:
                if ($isCollection)
                    return SpecialityToAdminResource::collection($specialityOrCollectionOfIt);
                return new SpecialityToAdminResource($specialityOrCollectionOfIt);
            case UserRoleEnum::PATIENT:
                if ($isCollection)
                    return SpecialityToPatientResource::collection($specialityOrCollectionOfIt);
                return new SpecialityToPatientResource($specialityOrCollectionOfIt);
            case UserRoleEnum::DOCTOR:
                if ($isCollection)
                    return SpecialityToDoctorResource::collection($specialityOrCollectionOfIt);
                return new SpecialityToDoctorResource($specialityOrCollectionOfIt);
        }
    }
    public function getAllSpecialitiesPaged(int $per_page = 10): Response
    {
        $isWithAdderAdmin = $isWithDoctors = false;
        $this->fillIncludedEntities($this->getCurrentUserRole(), $isWithAdderAdmin, $isWithDoctors);
        $response = $this->specialityRepository->getAllSpecialitiesPaged($per_page, $isWithAdderAdmin, $isWithDoctors);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $specialities = $response->data;

        $items = $specialities->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                'result' => 'Success',
                'current_page_number' => $specialities->currentPage(),
                'last_page_number' => $specialities->lastPage(),
                'specialities_per_page' => $specialities->perPage(),
                'next_page_url' => $specialities->nextPageUrl(),
                'previous_page_url' => $specialities->previousPageUrl(),
                'first_page_url' => $specialities->url(1),
                'last_page_url' => $specialities->url($specialities->lastPage()),
                'total_specialities_number' => $specialities->total(),
            ],
            $this->getSpecialityResource($items, true),
        );
    }
    public function addNewSpeciality(SpecialityDTO $specialityDTO): Response
    {
        $response = $this->specialityRepository->addNewSpeciality($specialityDTO->toArray());
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $addedSpeciality = $response->data;

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Speciality added successfully'),
            $this->getSpecialityResource($addedSpeciality, false),
            201
        );
    }
    public function showSpeciality(int $specialityId): Response
    {
        $isWithAdderAdmin = $isWithDoctors = false;
        $this->fillIncludedEntities($this->getCurrentUserRole(), $isWithAdderAdmin, $isWithDoctors);
        $response = $this->specialityRepository->getSpecialityById($specialityId, $isWithAdderAdmin, $isWithDoctors);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $speciality = $response->data;
        if ($speciality == null) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Speciality not found'),
                null,
                404
            );
        }

        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->getSpecialityResource($speciality, false),
        );
    }
    public function updateSpeciality(SpecialityDTOUpdate $specialityDTO, int $specialityId): Response
    {
        $response = $this->specialityRepository->getSpecialityById($specialityId);

        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $speciality = $response->data;
        if ($speciality == null) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Speciality not found'),
                null,
                404
            );
        }

        $specialityArray = $specialityDTO->toArray();
        $speciality->fill($specialityArray);
        if (!$speciality->isDirty()) {
            return new Response(
                ResponseStatusEnum::NOTHING,
                Response::messageToArray('No changes detected'),
            );
        }

        $speciality->save();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Speciality updated successfully'),
            $this->getSpecialityResource($speciality, false),
        );
    }
    public function deleteSpeciality(int $specialityId): Response
    {
        $response = $this->specialityRepository->getSpecialityById($specialityId);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $speciality = $response->data;
        if ($speciality == null) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Speciality not found'),
                null,
                404
            );
        }

        $response = $this->specialityRepository->deleteSpeciality($speciality);
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