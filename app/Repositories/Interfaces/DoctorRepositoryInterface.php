<?php

namespace App\Repositories\Interfaces;

use App\GeneralClasses\Response;
use App\Models\Doctor;

interface DoctorRepositoryInterface extends RepositoryInterface
{
    public function addNewDoctor(array $doctorData): Response;
    public function getAllDoctorsPaged(
        int $per_page = 10,
        bool $isWithRoom = false,
        bool $isWithAdderAdmin = false,
    ): Response;
    public function getDoctorById(
        int $doctorId,
        bool $isWithRoom = false,
        bool $isWithAdderAdmin = false,
    ): Response;

    public function deleteDoctor(Doctor &$doctor): Response;
}
