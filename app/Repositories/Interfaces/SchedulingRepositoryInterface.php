<?php

namespace App\Repositories\Interfaces;

use App\DTOs\DayWorkTime\DayWorkTimeDTO;
use App\DTOs\WorkScheduleDTO\WorkScheduleDTO;
use App\Enums\WorkScheduleTypeEnum;
use App\Models\DayWorkTime;
use App\Models\DoctorWorkSchedule;
use App\Models\MedicalCenterWorkSchedule;
use App\Models\WorkSchedule;

interface SchedulingRepositoryInterface extends RepositoryInterface
{
    public function allWeekDays();
    public function paginateDoctorsWorkSchedules(bool $withExpired = false, int $perPage = 10);
    public function paginateDoctorWorkSchedules(int $doctorId, bool $withExpired = false, int $perPage = 10);
    public function paginateMedicalCenterWorkSchedules(bool $withExpired = false, int $perPage = 10);
    public function allMedicalCenterWorkSchedules(bool $withExpired = false, bool $withMedicalCenterWorkSchedule = false, bool $withDayWorkTimes = false);
    public function findCurrentMedicalCenterWorkSchedule($failIfNotExists = true): WorkSchedule|null;
    public function findOldestMedicalCenterWorkSchedule(bool $considerExpiration = true, $failIfNotExists = true): WorkSchedule|null;
    public function getDoctorsNotExpiredWorkSchedulesContainOrAfterDate(string $addedScheduleEffectiveFromDate);
    public function findLastMedicalCenterWorkSchedule($failIfNotExists = true): WorkSchedule|null;
    public function findLastDoctorWorkSchedule($failIfNotExists = true, int $doctorId): WorkSchedule|null;
    public function updateLastWorkScheduleExpireDate(string $effectiveToDate, WorkScheduleTypeEnum $type, int $makerId): bool;
    public function findWorkSchedule(int $id, $failIfNotExists = true): WorkSchedule|null;
    public function createWorkSchedule(WorkScheduleDTO $dto): WorkSchedule;
    public function createDayWorkTime(DayWorkTimeDTO $dto): DayWorkTime;
    public function createDoctorWorkSchedule(int $workScheduleId, int $doctorId): DoctorWorkSchedule;
    public function createMedicalCenterWorkSchedule(int $workScheduleId, int $madeByAdminId): MedicalCenterWorkSchedule;
    public function allAvailableTimesToBook(string $dateOfDay, int $doctorId, bool $failIfScheduleNotExists = true);
    public function getWeekDayId(string $dateOfDay, $failIfWeekDayNotExists = true): int;
}