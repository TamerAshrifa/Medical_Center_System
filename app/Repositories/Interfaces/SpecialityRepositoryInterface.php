<?php

namespace App\Repositories\Interfaces;

use App\Models\Speciality;

interface SpecialityRepositoryInterface extends RepositoryInterface
{
    public function add(array $specialityData): Speciality;
    public function paginate(
        int $perPage = 10,
        bool $withAdderAdmin = false,
        bool $withDoctors = false,
    );
    public function find(
        int $id,
        bool $withAdderAdmin = false,
        bool $withDoctors = false,
        bool $failIfNotExists = true,
    ): Speciality;

    public function delete(Speciality &$speciality): bool;
}
