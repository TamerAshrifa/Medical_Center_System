<?php

namespace App\Repositories\Interfaces;

use App\Models\Doctor;

interface DoctorRepositoryInterface extends RepositoryInterface
{
    public function add(array $doctorData): Doctor;
    public function paginate(
        int $perPage = 10,
        bool $withUnactive = true,
        bool $withRoom = false,
        bool $withAdderAdmin = false,
        bool $withUser = false,
    );

    public function find(
        int $doctorId,
        bool $failIfNotExists = true,
        bool $withRoom = false,
        bool $withAdderAdmin = false,
        bool $withUser = false,
    ): Doctor;
    public function delete(Doctor &$doctor): bool;
    public function allDoctorsEmails();
    public function fullname(int $id): string;
    public function search(string $searchWord, bool $isSearcherAdmin);
    public function deactivate(int $id): bool;
    public function activate(int $id, bool $roomId): bool;

}
