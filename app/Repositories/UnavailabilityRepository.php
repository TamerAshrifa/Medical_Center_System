<?php

namespace App\Repositories;

use App\DTOs\Unavailability\UnavailabilityDTO;
use App\Enums\UnavailabilityTypeEnum;
use App\Models\DoctorUnavailability;
use App\Models\MedicalCenterUnavailability;
use App\Models\Unavailability;
use App\Repositories\Interfaces\UnavailabilityRepositoryInterface;
use Carbon\Carbon;

class UnavailabilityRepository extends Repository implements UnavailabilityRepositoryInterface
{
    public function paginateDoctorsUnavailabilities(bool $withPassed = false, int $perPage = 10)
    {
        return Unavailability::
            whereHas('doctorUnavailability')
            ->with([
                'doctorUnavailability',
                'doctorUnavailability.doctor:id,user_id',
                'doctorUnavailability.doctor.user:id,first_name,last_name',
            ])
            ->where('type', UnavailabilityTypeEnum::DOCTOR->value)
            ->orderBy('created_at', 'desc')
            ->when(!$withPassed, fn($q) => $q->where('to_date', '>=', Carbon::today()))
            ->paginate($perPage);
    }

    public function paginateDoctorUnavailabilities(bool $withPassed = false, int $perPage = 10, int $doctorId)
    {
        return Unavailability::
            whereHas('doctorUnavailability', fn($q) => $q->where('doctor_id', $doctorId))
            ->with([
                'doctorUnavailability',
                'doctorUnavailability.doctor:id,user_id',
                'doctorUnavailability.doctor.user:id,first_name,last_name',
            ])
            ->where('type', UnavailabilityTypeEnum::DOCTOR->value)
            ->orderBy('created_at', 'desc')
            ->when(!$withPassed, fn($q) => $q->where('to_date', '>=', Carbon::today()))
            ->paginate($perPage);
    }

    public function paginateMedicalUnavailabilities(bool $withPassed = false, int $perPage = 10)
    {
        return Unavailability::
            whereHas('medicalCenterUnavailability')
            ->with([
                'medicalCenterUnavailability',
                'medicalCenterUnavailability.madeByAdmin:id,user_id',
                'medicalCenterUnavailability.madeByAdmin.user:id,first_name,last_name',
            ])
            ->where('type', UnavailabilityTypeEnum::MEDICAL_CENTER->value)
            ->when(!$withPassed, fn($q) => $q->where('to_date', '>=', Carbon::today()))
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function isMedicalCenterUnavailability(string $dateOfDay): Unavailability|null
    {
        return Unavailability::
            whereHas('medicalCenterUnavailability')
            ->where('type', UnavailabilityTypeEnum::MEDICAL_CENTER->value)
            ->where('from_date', '<=', $dateOfDay)
            ->where('to_date', '>=', $dateOfDay)
            ->first();
    }

    public function isDoctorUnavailability(string $dateOfDay, int $doctorId): Unavailability|null
    {
        return Unavailability::
            whereHas('doctorUnavailability', fn($q) => $q->where('doctor_id', $doctorId))
            ->where('type', UnavailabilityTypeEnum::DOCTOR->value)
            ->where('from_date', '<=', $dateOfDay)
            ->where('to_date', '>=', $dateOfDay)
            ->first();
    }

    public function createUnavailability(UnavailabilityDTO $dto): Unavailability
    {
        return Unavailability::create($dto->toArray());
    }

    public function createDoctorUnavailability(int $unavailabilityId, int $doctorId): DoctorUnavailability
    {
        return DoctorUnavailability::create([
            'unavailability_id' => $unavailabilityId,
            'doctor_id' => $doctorId,
        ]);
    }

    public function createMedicalCenterUnavailability(int $unavailabilityId, int $madeByAdminId): MedicalCenterUnavailability
    {
        return MedicalCenterUnavailability::create([
            'unavailability_id' => $unavailabilityId,
            'made_by_admin_id' => $madeByAdminId,
        ]);
    }

    public function isThereConflictWithAnotherUnavailabilityForDoctor(string $startDate, string $endDate, int $doctorId): bool
    {
        return Unavailability::query()
            ->whereHas('doctorUnavailability', fn($q) => $q->where('doctor_id', $doctorId))
            ->whereDate('from_date', '<=', $endDate)
            ->whereDate('to_date', '>=', $startDate)
            ->exists();
    }

    public function isThereConflictWithAnotherUnavailabilityForMedicalCenter(string $startDate, string $endDate): bool
    {
        return Unavailability::query()
            ->whereHas('medicalCenterUnavailability')
            ->whereDate('from_date', '<=', $endDate)
            ->whereDate('to_date', '>=', $startDate)
            ->exists();
    }

}
