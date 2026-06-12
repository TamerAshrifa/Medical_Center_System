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
    public function paginateMedicalCenterWorkSchedules(int $per_page = 10)
    {
        return WorkSchedule::with('medicalCenterWorkSchedule')->whereHas('medicalCenterWorkSchedule')
            ->where('type', WorkScheduleTypeEnum::MEDICAL_CENTER->value)->orderBy('created_at', 'desc')
            ->paginate($per_page);
    }
    public function findWorkSchedule(int $id, $failIfNotExists = true): WorkSchedule|null
    {
        return $failIfNotExists ? WorkSchedule::findOrFail($id) : WorkSchedule::find($id);
    }
    public function paginateWorkSchedules(int $per_page = 10)
    {
        return WorkSchedule::with('doctorWorkSchedule', 'medicalCenterWorkSchedule')
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
