<?php

namespace App\Repositories;

use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Repositories\Interfaces\DoctorRepositoryInterface;
use DB;

class DoctorRepository extends Repository implements DoctorRepositoryInterface
{
    private function getIncludedEntities(bool $isWithRoom, bool $isWithAdderAdmin, bool $isWithUser): array
    {
        $included = [];
        if ($isWithRoom)
            $included[] = 'room';
        if ($isWithAdderAdmin)
            $included[] = 'addedByAdmin';
        if ($isWithUser)
            $included[] = 'user';

        return $included;
    }
    public function addNewDoctor(array $doctorData): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            Doctor::create($doctorData),
            201
        );
    }
    public function getAllDoctorsPaged(
        int $per_page = 10,
        bool $isWithRoom = false,
        bool $isWithAdderAdmin = false,
        bool $isWithUser = false,
    ): Response {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            Doctor::with($this->getIncludedEntities($isWithRoom, $isWithAdderAdmin, $isWithUser))
                ->orderBy('created_at', 'desc')->paginate($per_page),
        );
    }

    public function getDoctorById(
        int $doctorId,
        bool $failIfNotExists = true,
        bool $isWithRoom = false,
        bool $isWithAdderAdmin = false,
        bool $isWithUser = false,
    ) {
        $returned = $failIfNotExists ?
            Doctor::with($this->getIncludedEntities($isWithRoom, $isWithAdderAdmin, $isWithUser))->findOrFail($doctorId) :
            Doctor::with($this->getIncludedEntities($isWithRoom, $isWithAdderAdmin, $isWithUser))->find($doctorId);
        return $returned;
    }
    public function deleteDoctor(Doctor &$doctor): Response
    {
        $user = $doctor->user;
        try {
            return DB::transaction(function () use (&$doctor, $user) {
                if (!$doctor->delete() || !$user->delete())
                    throw new \LogicException('Field to delete doctor, please try again');
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