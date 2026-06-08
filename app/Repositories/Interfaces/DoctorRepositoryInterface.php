<?php

namespace App\Repositories\Interfaces;

use App\GeneralClasses\Response;
use App\Models\Doctor;

interface DoctorRepositoryInterface extends RepositoryInterface
{
    public function addNewDoctor(array $doctorData);
    public function getAllDoctorsPaged(
        int $per_page = 10,
        bool $isWithRoom = false,
        bool $isWithAdderAdmin = false,
    );
    public function getDoctorById(
        int $doctorId,
        bool $failIfNotExists = true,
        bool $isWithRoom = false,
        bool $isWithAdderAdmin = false,
    );

    public function deleteDoctor(Doctor &$doctor);
}
