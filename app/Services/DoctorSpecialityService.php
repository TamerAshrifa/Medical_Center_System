<?php

namespace App\Services;

use App\DTOs\User\DoctorSpecialityDTO;
use App\DTOs\User\DoctorSpecialityDTOUpdate;

use App\GeneralClasses\Response;
use App\Repositories\Interfaces\DoctorSpecialityRepositoryInterface;

class DoctorSpecialityService extends Service
{
    public function __construct(
        protected DoctorSpecialityRepositoryInterface $doctorSpecialityRepository,
    ) {
    }

    public function paginate(int $perPage = 10): Response
    {
        $records = $this->doctorSpecialityRepository->paginate($perPage);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function allForDoctor(int $doctorId): Response
    {
        return new Response(
            true,
            null,
            $this->doctorSpecialityRepository->allForDoctor($doctorId)
        );
    }
    public function allForSpeciality(int $specialityId): Response
    {
        return new Response(
            true,
            null,
            $this->doctorSpecialityRepository->allForSpeciality($specialityId)
        );
    }
    public function create(DoctorSpecialityDTO $dto): Response
    {
        if ($this->doctorSpecialityRepository->exists($dto->doctor_id, $dto->speciality_id)) {
            return new Response(
                false,
                Response::messageToArray('Speciality already exists'),
                null,
                409
            );
        }

        return new Response(
            true,
            Response::messageToArray('Speciality added successfully'),
            $this->doctorSpecialityRepository->create($dto),
            201
        );
    }
    public function find(
        int $id,
        $failIfNotExists = true,
        $withDoctor = false,
        $withSpeciality = false
    ): Response {
        return new Response(
            true,
            null,
            $this->doctorSpecialityRepository->find($id, $failIfNotExists, $withDoctor, $withSpeciality)
        );
    }
    public function update(int $id, DoctorSpecialityDTOUpdate $dto): Response
    {
        if (!$this->doctorSpecialityRepository->update($dto, $id))
            return new Response(
                false,
                Response::messageToArray('Failed to delete the speciality, please try again'),
            );

        return new Response(
            true,
            Response::messageToArray('Your speciality updated successfully'),
        );
    }
    public function delete(int $id): Response
    {
        return $this->doctorSpecialityRepository->delete($id) ?
            new Response(true, null, null, 204) :
            new Response(
                false,
                Response::messageToArray('Failed to delete speciality, please try again'),
                null,
                500
            );
    }

}