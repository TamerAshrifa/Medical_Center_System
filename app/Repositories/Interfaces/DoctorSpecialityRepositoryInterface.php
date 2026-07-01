<?php

namespace App\Repositories\Interfaces;

use App\DTOs\User\DoctorSpecialityDTO;
use App\DTOs\User\DoctorSpecialityDTOUpdate;
use App\Models\DoctorSpeciality;

interface DoctorSpecialityRepositoryInterface extends RepositoryInterface
{
    public function create(DoctorSpecialityDTO $dto): DoctorSpeciality;

    public function update(DoctorSpecialityDTOUpdate $dto, int $id): bool;

    public function delete(int $id): bool;

    public function find(
        int $id,
        $failIfNotExists = true,
        $withDoctor = false,
        $withSpeciality = false
    ): DoctorSpeciality|null;

    public function paginate(int $perPage = 10);

    public function exists(int $doctorId, int $specialityId): bool;

    public function allForDoctor(int $doctorId);

    public function allForSpeciality(int $specialityId);

}