<?php

namespace App\Repositories;

use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Models\Speciality;
use App\Repositories\Interfaces\SpecialityRepositoryInterface;

class SpecialityRepository extends Repository implements SpecialityRepositoryInterface
{
    private function getIncludedEntities(bool $withAdderAdmin, bool $withDoctors): array
    {
        $included = [];
        if ($withAdderAdmin)
            $included[] = 'addedByAdmin';
        if ($withDoctors)
            $included[] = 'doctors';

        return $included;
    }
    public function addNewSpeciality(array $specialityData): Response
    {
        return $this->executeCode(function () use (&$specialityData) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Speciality::create($specialityData),
                201
            );
        });
    }
    public function getAllSpecialitiesPaged(
        int $per_page = 10,
        bool $isWithAdderAdmin = false,
        bool $isWithDoctors = false
    ): Response {
        return $this->executeCode(function () use ($per_page, $isWithAdderAdmin, $isWithDoctors) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Speciality::with($this->getIncludedEntities($isWithAdderAdmin, $isWithDoctors))
                    ->orderBy('created_at', 'desc')->paginate($per_page),
            );
        });
    }

    public function getSpecialityById(
        int $specialityId,
        bool $isWithAdderAdmin = false,
        bool $isWithDoctors = false,
    ): Response {
        return $this->executeCode(function () use ($specialityId, $isWithAdderAdmin, $isWithDoctors) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Speciality::with($this->getIncludedEntities($isWithAdderAdmin, $isWithDoctors))
                    ->find($specialityId)
            );
        });
    }

    public function deleteSpeciality(Speciality &$speciality): Response
    {
        return $this->executeCode(function () use (&$speciality) {
            $speciality->delete();
            return new Response(ResponseStatusEnum::SUCCESS, null, null, 204);
        }, true, true);
    }

}