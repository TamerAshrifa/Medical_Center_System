<?php

namespace App\Repositories;

use App\DTOs\DayWorkTime\DayWorkTimeDTO;
use App\DTOs\WorkScheduleDTO\WorkScheduleDTO;
use App\Enums\WorkScheduleTypeEnum;
use App\Models\DayWorkTime;
use App\Models\DoctorWorkSchedule;
use App\Models\MedicalCenterWorkSchedule;
use App\Models\WeekDay;
use App\Models\WorkSchedule;
use App\Repositories\Interfaces\SchedulingRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class SchedulingRepository extends Repository implements SchedulingRepositoryInterface
{
    public function allWeekDays()
    {
        return WeekDay::all();
    }
    public function paginateDoctorsWorkSchedules(bool $withExpired = false, int $per_page = 10)
    {
        return WorkSchedule::whereHas('doctorWorkSchedule')
            ->with('doctorWorkSchedule')
            ->where('type', WorkScheduleTypeEnum::DOCTOR->value)
            ->orderBy('created_at', 'desc')
            ->when(!$withExpired, function ($q) {
                $q->where(function ($q2) {
                    $q2->where('effective_to_date', '>=', Carbon::today())
                        ->orWhereNull('effective_to_date');
                });
            })
            ->paginate($per_page);
    }
    public function paginateDoctorWorkSchedules(int $doctorId, bool $withExpired = false, int $per_page = 10)
    {
        return WorkSchedule::whereHas('doctorWorkSchedule', fn($q) => $q->where('doctor_id', $doctorId))
            ->with(['doctorWorkSchedule', 'dayWorkTimes'])
            ->where('type', WorkScheduleTypeEnum::DOCTOR->value)
            ->when(!$withExpired, function ($q) {
                $q->where(function ($q2) {
                    $q2->where('effective_to_date', '>=', Carbon::today())
                        ->orWhereNull('effective_to_date');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($per_page);
    }
    public function paginateMedicalCenterWorkSchedules(bool $withExpired = false, int $per_page = 10)
    {
        return WorkSchedule::whereHas('medicalCenterWorkSchedule')->with('medicalCenterWorkSchedule')
            ->where('type', WorkScheduleTypeEnum::MEDICAL_CENTER->value)
            ->when(!$withExpired, function ($q) {
                $q->where(function ($q2) {
                    $q2->where('effective_to_date', '>=', Carbon::now())
                        ->orWhereNull('effective_to_date');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($per_page);
    }
    public function allMedicalCenterWorkSchedules(bool $withExpired = false, bool $withMedicalCenterWorkSchedule = false, bool $withDayWorkTimes = false): Collection
    {
        return WorkSchedule::whereHas('medicalCenterWorkSchedule')
            ->where('type', WorkScheduleTypeEnum::MEDICAL_CENTER->value)
            ->when(!$withExpired, function ($q) {
                $q->where(function ($q2) {
                    $q2->where('effective_to_date', '>=', Carbon::today())
                        ->orWhereNull('effective_to_date');
                });
            })
            ->when($withMedicalCenterWorkSchedule, fn($q) => $q->with('medicalCenterWorkSchedule'))
            ->when($withDayWorkTimes, fn($q) => $q->with('dayWorkTimes'))
            ->orderBy('created_at', 'asc')
            ->get();
    }
    public function findCurrentMedicalCenterWorkSchedule($failIfNotExists = true): WorkSchedule|null
    {
        $today = Carbon::today();
        $query = WorkSchedule::query()
            ->where('type', WorkScheduleTypeEnum::MEDICAL_CENTER->value)
            ->where('effective_from_date', '<=', $today)
            ->where(function ($q) use ($today) {
                $q->whereNull('effective_to_date')
                    ->orWhere('effective_to_date', '>=', $today);
            });

        return $failIfNotExists ?
            $query->firstOrFail() :
            $query->first();

    }
    public function findOldestMedicalCenterWorkSchedule(bool $considerExpiration = true, $failIfNotExists = true): WorkSchedule|null
    {
        $today = Carbon::today();
        $query = WorkSchedule::query()
            ->where('type', WorkScheduleTypeEnum::MEDICAL_CENTER->value)
            ->when(
                $considerExpiration,
                function ($q) use ($today) {
                    $q->whereNull('effective_to_date')
                        ->orWhere('effective_to_date', '>=', $today);
                }
            )
            ->orderBy('effective_from_date');

        return $failIfNotExists ?
            $query->firstOrFail() :
            $query->first();

    }
    public function getDoctorsNotExpiredWorkSchedulesContainOrAfterDate(string $addedScheduleEffectiveFromDate)
    {
        return WorkSchedule::query()
            ->selectRaw('day_work_times.weekday_id, MIN(day_work_times.start_time) as start_time, MAX(day_work_times.end_time) as end_time')
            ->join('day_work_times', 'work_schedules.id', '=', 'day_work_times.work_schedule_id')
            ->where('work_schedules.type', WorkScheduleTypeEnum::DOCTOR->value)
            ->where(function ($q) use ($addedScheduleEffectiveFromDate) {
                $q->where('work_schedules.effective_to_date', '>=', $addedScheduleEffectiveFromDate)
                    ->orWhereNull('work_schedules.effective_to_date');
            })
            ->groupBy('day_work_times.weekday_id')
            ->get();
    }
    public function findLastMedicalCenterWorkSchedule($failIfNotExists = true): WorkSchedule|null
    {
        $q = WorkSchedule::where('type', WorkScheduleTypeEnum::MEDICAL_CENTER->value)->whereNull('effective_to_date');

        return $failIfNotExists ?
            $q->firstOrFail() :
            $q->first();
    }
    public function findLastDoctorWorkSchedule($failIfNotExists = true, int $doctorId): WorkSchedule|null
    {
        $query = WorkSchedule::query()
            ->whereHas('doctorWorkSchedule', fn($q) => $q->where('doctor_id', $doctorId))
            ->where('type', WorkScheduleTypeEnum::DOCTOR->value)
            ->WhereNull('effective_to_date');

        return $failIfNotExists ? $query->firstOrFail() : $query->first();
    }
    public function updateLastWorkScheduleExpireDate(string $effective_to_date, WorkScheduleTypeEnum $type, int $makerId): bool
    {
        $workSchedule = ($type == WorkScheduleTypeEnum::MEDICAL_CENTER) ?
            $this->findLastMedicalCenterWorkSchedule(false) :
            $this->findLastDoctorWorkSchedule(false, $makerId);
        if (!$workSchedule)
            return true;

        return $workSchedule->update([
            'effective_to_date' => $effective_to_date
        ]) > 0;
    }
    public function findWorkSchedule(int $id, $failIfNotExists = true): WorkSchedule|null
    {
        return $failIfNotExists ? WorkSchedule::findOrFail($id) : WorkSchedule::find($id);
    }
    public function paginateWorkSchedules(bool $withExpired = false, int $per_page = 10)
    {
        return WorkSchedule::with(['doctorWorkSchedule', 'medicalCenterWorkSchedule'])
            ->when(!$withExpired, function ($q) {
                $q->where(function ($q2) {
                    $q2->where('effective_to_date', '>=', Carbon::today())
                        ->orWhereNull('effective_to_date');
                });
            })
            ->orderBy('created_at', 'desc')->paginate($per_page);
    }
    public function createWorkSchedule(WorkScheduleDTO $dtoData): WorkSchedule
    {
        return WorkSchedule::create($dtoData->toArray());
    }
    public function createDayWorkTime(DayWorkTimeDTO $dayWorkTimeDTO): DayWorkTime
    {
        return DayWorkTime::create($dayWorkTimeDTO->toArray());
    }
    public function createDoctorWorkSchedule(int $work_schedule_id, int $doctor_id): DoctorWorkSchedule
    {
        return DoctorWorkSchedule::create([
            'doctor_id' => $doctor_id,
            'work_schedule_id' => $work_schedule_id,
        ]);
    }
    public function createMedicalCenterWorkSchedule(int $work_schedule_id, int $made_by_admin_id): MedicalCenterWorkSchedule
    {
        return MedicalCenterWorkSchedule::create([
            'work_schedule_id' => $work_schedule_id,
            'made_by_admin_id' => $made_by_admin_id,
        ]);
    }
    public function allAvailableTimesToBook(string $dateOfDay, int $doctorId, bool $failIfScheduleNotExists = true): Collection
    {
        $query = WorkSchedule::query()
            ->with(['dayWorkTimes'])
            ->whereHas('doctorWorkSchedule', fn($q) => $q->where('doctor_id', $doctorId))
            ->where(function ($query) use ($dateOfDay) {
                $query->where(function ($query) use ($dateOfDay) {
                    $query->where('effective_from_date', '<=', $dateOfDay)
                        ->where('effective_to_date', '>=', $dateOfDay);
                })
                    ->orWhere(function ($query) use ($dateOfDay) {
                        $query->where('effective_from_date', '<=', $dateOfDay)
                            ->whereNull('effective_to_date');
                    });
            })
            ->orderByRaw('effective_to_date IS NULL ASC');

        if ($failIfScheduleNotExists)
            return $query->firstOrFail()->dayWorkTimes;

        $returned = $query->first();
        return $returned ?
            $returned->dayWorkTimes :
            Collection::empty();

    }
    public function getWeekDayId(string $dateOfDay, $failIfWeekDayNotExists = true): int
    {
        $query = WeekDay::query()->where('name', Carbon::parse($dateOfDay)->dayName);
        return $failIfWeekDayNotExists ? $query->valueOrFail('id') : $query->value('id');
    }
}
