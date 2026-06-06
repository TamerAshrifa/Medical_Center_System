<?php

namespace App\Repositories\Interfaces;

use App\GeneralClasses\Response;
use App\Models\Speciality;

interface SpecialityRepositoryInterface extends RepositoryInterface
{
    public function addNewSpeciality(array $specialityData): Response;
    public function getAllSpecialitiesPaged(
        int $per_page = 10,
        bool $isWithAdderAdmin = false,
        bool $isWithDoctors = false,
    ): Response;
    public function getSpecialityById(
        int $specialityId,
        bool $isWithAdderAdmin = false,
        bool $isWithDoctors = false,
    ): Response;

    public function deleteSpeciality(Speciality &$speciality): Response;
}
