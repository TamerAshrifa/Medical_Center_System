<?php

namespace App\Services;

use App\DTOs\Speciality\SpecialityDTO;
use App\DTOs\Speciality\SpecialityDTOUpdate;
use App\Enums\UserRoleEnum;
use App\GeneralClasses\Response;
use App\Repositories\Interfaces\SpecialityRepositoryInterface;

class SpecialityService extends Service
{
    public function __construct(
        protected SpecialityRepositoryInterface $specialityRepository,
    ) {
    }

    private function fillIncludedEntities(
        UserRoleEnum $role,
        bool &$withAdderAdmin,
        bool &$withDoctors,
    ): void {
        switch ($role) {
            case UserRoleEnum::ADMIN:
                $withAdderAdmin = $withDoctors = true;
                break;
            case UserRoleEnum::PATIENT:
                $withAdderAdmin = $withDoctors = false;
                break;
            case UserRoleEnum::DOCTOR:
                $withAdderAdmin = $withDoctors = false;
                break;
        }
    }
    public function paginate(int $perPage = 10, UserRoleEnum $userRole): Response
    {
        $isWithAdderAdmin = $isWithDoctors = false;
        $this->fillIncludedEntities($userRole, $isWithAdderAdmin, $isWithDoctors);

        $records = $this->specialityRepository->paginate($perPage, $isWithAdderAdmin, $isWithDoctors);

        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items(),
        );
    }
    public function add(SpecialityDTO $dto): Response
    {
        return new Response(
            true,
            Response::messageToArray('Speciality added successfully'),
            $this->specialityRepository->add($dto->toArray()),
            201
        );
    }
    public function show(int $id, UserRoleEnum $userRole): Response
    {
        $isWithAdderAdmin = $isWithDoctors = false;
        $this->fillIncludedEntities($userRole, $isWithAdderAdmin, $isWithDoctors);

        return new Response(
            true,
            null,
            $this->specialityRepository->find($id, $isWithAdderAdmin, $isWithDoctors),
        );
    }
    public function update(SpecialityDTOUpdate $dto, int $id): Response
    {
        $speciality = $this->specialityRepository->find($id);

        $specialityArray = $dto->toArray();
        $speciality->fill($specialityArray);
        if (!$speciality->isDirty()) {
            return new Response(
                true,
                Response::messageToArray('No changes detected'),
            );
        }

        $speciality->save();
        return new Response(
            true,
            Response::messageToArray('Speciality updated successfully'),
            $speciality,
        );
    }
    public function delete(int $id): Response
    {
        $speciality = $this->specialityRepository->find($id);

        if (!$this->specialityRepository->delete($speciality))
            return new Response(
                false,
                Response::messageToArray('Failed to delete speciality, please try again'),
                null,
                500
            );
        return new Response(
            true,
            null,
            null,
            204
        );
    }

}