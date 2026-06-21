<?php

namespace App\Repositories\Interfaces;

use App\DTOs\DayWorkTime\DayWorkTimeDTO;
use App\DTOs\WorkScheduleDTO\WorkScheduleDTO;
use App\Enums\WorkScheduleTypeEnum;
use App\Models\DayWorkTime;
use App\Models\DoctorWorkSchedule;
use App\Models\MedicalCenterWorkSchedule;
use App\Models\WorkSchedule;
use Illuminate\Database\Eloquent\Collection;

interface SchedulingRepositoryInterface extends RepositoryInterface
{
    public function allWeekDays();
    public function paginateDoctorsWorkSchedules(bool $withExpired = false, int $per_page = 10);
    public function paginateDoctorWorkSchedules(int $doctorId, bool $withExpired = false, int $per_page = 10);
    public function paginateMedicalCenterWorkSchedules(bool $withExpired = false, int $per_page = 10);
    public function allMedicalCenterWorkSchedules(bool $withExpired = false, bool $withMedicalCenterWorkSchedule = false, bool $withDayWorkTimes = false): Collection;
    public function findCurrentMedicalCenterWorkSchedule($failIfNotExists = true): WorkSchedule|null;
    public function findOldestMedicalCenterWorkSchedule(bool $considerExpiration = true, $failIfNotExists = true): WorkSchedule|null;
    public function getDoctorsNotExpiredWorkSchedulesContainOrAfterDate(string $addedScheduleEffectiveFromDate);
    public function findLastMedicalCenterWorkSchedule($failIfNotExists = true): WorkSchedule|null;
    public function findLastDoctorWorkSchedule($failIfNotExists = true, int $doctorId): WorkSchedule|null;
    public function updateLastWorkScheduleExpireDate(string $effective_to_date, WorkScheduleTypeEnum $type, int $makerId): bool;
    public function findWorkSchedule(int $id, $failIfNotExists = true): WorkSchedule|null;
    public function paginateWorkSchedules(bool $withExpired = false, int $per_page = 10);
    public function createWorkSchedule(WorkScheduleDTO $dtoData): WorkSchedule;
    public function createDayWorkTime(DayWorkTimeDTO $dayWorkTimeDTO): DayWorkTime;
    public function createDoctorWorkSchedule(int $work_schedule_id, int $doctor_id): DoctorWorkSchedule;
    public function createMedicalCenterWorkSchedule(int $work_schedule_id, int $made_by_admin_id): MedicalCenterWorkSchedule;
    public function allAvailableTimesToBook(string $dateOfDay, int $doctorId, bool $failIfScheduleNotExists = true): Collection;
    public function getWeekDayId(string $dateOfDay, $failIfWeekDayNotExists = true): int;
}