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

class SchedulingRepository extends Repository implements SchedulingRepositoryInterface
{
    public function allWeekDays()
    {
        return WeekDay::all();
    }
    public function paginateDoctorsWorkSchedules(int $per_page = 10)
    {
        return WorkSchedule::with('doctorWorkSchedule')->whereHas('doctorWorkSchedule')
            ->where('type', WorkScheduleTypeEnum::DOCTOR->value)->orderBy('created_at', 'desc')
            ->paginate($per_page);
    }
    public function paginateDoctorWorkSchedules(int $doctorId, bool $withExpired = false, int $per_page = 10)
    {
        return WorkSchedule::whereHas('doctorWorkSchedule', fn($q) => $q->where('doctor_id', $doctorId))
            ->with(['doctorWorkSchedule', 'dayWorkTimes'])
            ->where('type', WorkScheduleTypeEnum::DOCTOR->value)
            ->when(
                !$withExpired,
                function ($q) {
                    $q->where(function ($q2) {
                        $q2->where('effective_to_date', '>=', Carbon::now())
                            ->orWhereNull('effective_to_date');
                    });
                }
            )
            ->orderBy('created_at', 'desc')
            ->paginate($per_page);
    }
    public function paginateMedicalCenterWorkSchedules(int $per_page = 10, bool $withExpired = false)
    {
        return WorkSchedule::whereHas('medicalCenterWorkSchedule')->with('medicalCenterWorkSchedule')
            ->where('type', WorkScheduleTypeEnum::MEDICAL_CENTER->value)
            ->when(
                !$withExpired,
                function ($q) {
                    $q->where(function ($q2) {
                        $q2->where('effective_to_date', '>=', Carbon::now())
                            ->orWhereNull('effective_to_date');
                    });
                }
            )
            ->orderBy('created_at', 'desc')
            ->paginate($per_page);
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

        return $failIfNotExists ? $query->firstOrFail() : $query->first();

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
    public function updateLastWorkScheduleExpireDate(
        string $effective_to_date,
        WorkScheduleTypeEnum $type,
        int $makerId
    ): bool {
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
    public function paginateWorkSchedules(int $per_page = 10)
    {
        return WorkSchedule::with(['doctorWorkSchedule', 'medicalCenterWorkSchedule'])
            ->orderBy('created_at', 'desc')->paginate($per_page);
    }
    public function createWorkSchedule(WorkScheduleDTO $dtoData): WorkSchedule
    {
        return WorkSchedule::create($dtoData->toArray());
    }
    public function markWorkScheduleAsForDoctor(int $workScheduleId): bool
    {
        return $this->findWorkSchedule($workScheduleId)->update([
            'type' => WorkScheduleTypeEnum::DOCTOR->value,
        ]);
    }
    public function markWorkScheduleAsForMedicalCenter(int $workScheduleId): bool
    {
        return $this->findWorkSchedule($workScheduleId)->update([
            'type' => WorkScheduleTypeEnum::MEDICAL_CENTER->value,
        ]);
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

}
