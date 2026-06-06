<?php

namespace App\Repositories;

use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Repositories\Interfaces\DoctorRepositoryInterface;

class DoctorRepository extends Repository implements DoctorRepositoryInterface
{
    private function getIncludedEntities(bool $isWithRoom, bool $isWithAdderAdmin): array
    {
        $included = [];
        if ($isWithRoom)
            $included[] = 'room';
        if ($isWithAdderAdmin)
            $included[] = 'addedByAdmin';

        return $included;
    }
    public function addNewDoctor(array $doctorData): Response
    {
        return $this->executeCode(function () use (&$doctorData) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Doctor::create($doctorData),
                201
            );
        });
    }
    public function getAllDoctorsPaged(
        int $per_page = 10,
        bool $isWithRoom = false,
        bool $isWithAdderAdmin = false,
    ): Response {
        return $this->executeCode(function () use ($per_page, $isWithRoom, $isWithAdderAdmin) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Doctor::with($this->getIncludedEntities($isWithRoom, $isWithAdderAdmin))
                    ->orderBy('created_at', 'desc')->paginate($per_page),
            );
        });
    }

    public function getDoctorById(
        int $doctorId,
        bool $isWithRoom = false,
        bool $isWithAdderAdmin = false,
    ): Response {
        return $this->executeCode(function () use ($doctorId, $isWithRoom, $isWithAdderAdmin) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Doctor::with($this->getIncludedEntities($isWithRoom, $isWithAdderAdmin))
                    ->find($doctorId)
            );
        });
    }
    public function deleteDoctor(Doctor &$doctor): Response
    {
        return $this->executeCode(function () use (&$doctor) {
            $doctor->delete();
            return new Response(ResponseStatusEnum::SUCCESS, null, null, 204);
        }, true, true);
    }

}