<?php

namespace App\Repositories\Interfaces;

use App\DTOs\DayWorkTime\DayWorkTimeDTO;
use App\DTOs\WorkScheduleDTO\WorkScheduleDTO;
use App\Models\DayWorkTime;
use App\Models\DoctorWorkSchedule;
use App\Models\MedicalCenterWorkSchedule;
use App\Models\WorkSchedule;

interface SchedulingRepositoryInterface extends RepositoryInterface
{
    public function allWeekDays();
    public function paginateDoctorsWorkSchedules(int $per_page = 10);
    public function paginateMedicalCenterWorkSchedules(int $per_page = 10);
    public function findWorkSchedule(int $id, $failIfNotExists = true): WorkSchedule|null;
    public function paginateWorkSchedules(int $per_page = 10);
    public function createWorkSchedule(WorkScheduleDTO $dtoData): WorkSchedule;
    public function markWorkScheduleAsForDoctor(int $workScheduleId): bool;
    public function markWorkScheduleAsForMedicalCenter(int $workScheduleId): bool;
    public function createDayWorkTime(DayWorkTimeDTO $dayWorkTimeDTO): DayWorkTime;
    public function createDoctorWorkSchedule(int $work_schedule_id, int $doctor_id): DoctorWorkSchedule;
    public function createMedicalCenterWorkSchedule(int $work_schedule_id, int $made_by_admin_id): MedicalCenterWorkSchedule;
}