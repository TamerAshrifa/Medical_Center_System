<?php

namespace App\Repositories\Interfaces;

use App\DTOs\Unavailability\UnavailabilityDTO;
use App\Models\DoctorUnavailability;
use App\Models\MedicalCenterUnavailability;
use App\Models\Unavailability;

interface UnavailabilityRepositoryInterface extends RepositoryInterface
{
    public function paginateDoctorsUnavailabilities(bool $withPassed = false, int $perPage = 10);
    public function paginateDoctorUnavailabilities(bool $withPassed = false, int $perPage = 10, int $doctorId);
    public function paginateMedicalUnavailabilities(bool $withPassed = false, int $perPage = 10);
    public function isMedicalCenterUnavailability(string $dateOfDay): Unavailability|null;
    public function isDoctorUnavailability(string $dateOfDay, int $doctorId): Unavailability|null;
    public function createUnavailability(UnavailabilityDTO $dto): Unavailability;
    public function createDoctorUnavailability(int $unavailabilityId, int $doctorId): DoctorUnavailability;
    public function createMedicalCenterUnavailability(int $unavailabilityId, int $madeByAdminId): MedicalCenterUnavailability;
    public function isThereConflictWithAnotherUnavailabilityForDoctor(string $startDate, string $endDate, int $doctorId): bool;
    public function isThereConflictWithAnotherUnavailabilityForMedicalCenter(string $startDate, string $endDate): bool;


}
