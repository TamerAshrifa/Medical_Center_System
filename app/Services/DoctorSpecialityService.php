<?php

namespace App\Services;

use App\DTOs\User\DoctorSpecialityDTO;
use App\DTOs\User\DoctorSpecialityDTOUpdate;
use App\DTOs\User\UserDTO;
use App\DTOs\User\UserDTOUpdate;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Repositories\Interfaces\DoctorSpecialityRepositoryInterface;
use function Illuminate\Support\now;

class DoctorSpecialityService extends Service
{
    public function __construct(
        protected DoctorSpecialityRepositoryInterface $doctorSpecialityRepository,
    ) {
    }

    public function paginate(int $per_page = 10): Response
    {
        $doctorsSpecialities = $this->doctorSpecialityRepository->paginate($per_page);
        $items = $doctorsSpecialities->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "result" => "Success",
                "current_page_number" => $doctorsSpecialities->currentPage(),
                "last_page_number" => $doctorsSpecialities->lastPage(),
                "records_per_page" => $doctorsSpecialities->perPage(),
                "next_page_url" => $doctorsSpecialities->nextPageUrl(),
                "previous_page_url" => $doctorsSpecialities->previousPageUrl(),
                "first_page_url" => $doctorsSpecialities->url(1),
                "last_page_url" => $doctorsSpecialities->url($doctorsSpecialities->lastPage()),
                "total_records_number" => $doctorsSpecialities->total(),
            ],
            $items
        );
    }


    public function allForDoctor(int $doctorId): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->doctorSpecialityRepository->allForDoctor($doctorId)
        );
    }

    public function allForSpeciality(int $specialityId): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->doctorSpecialityRepository->allForSpeciality($specialityId)
        );
    }

    public function create(DoctorSpecialityDTO $dtoData): Response
    {
        if ($this->doctorSpecialityRepository->exists($dtoData->doctor_id, $dtoData->speciality_id)) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Speciality already exists'),
                null,
                409
            );
        }

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Speciality added successfully'),
            $this->doctorSpecialityRepository->create($dtoData),
            201
        );
    }
    public function find(int $id): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->doctorSpecialityRepository->find($id, true, true, true)
        );
    }
    public function update(int $id, DoctorSpecialityDTOUpdate $dtoData): Response
    {
        $response = $this->doctorSpecialityRepository->update($dtoData, $id);

        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Your speciality updated successfully'),
            $response->data
        );
    }
    public function delete(int $id): Response
    {
        return $this->doctorSpecialityRepository->delete($id) ?
            new Response(ResponseStatusEnum::SUCCESS, null, null, 204) :
            new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Failed to delete speciality, please try again'),
                null,
                500
            );
    }

}