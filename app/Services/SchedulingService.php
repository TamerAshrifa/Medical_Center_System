<?php

namespace App\Services;

use App\DTOs\DayWorkTime\DayWorkTimeDTO;
use App\DTOs\WorkScheduleDTO\WorkScheduleDTO;
use App\Enums\UserRoleEnum;
use App\Enums\WorkScheduleTypeEnum;

use App\GeneralClasses\Response;
use App\Repositories\Interfaces\SchedulingRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Carbon\Carbon;
use DB;

class SchedulingService extends Service
{
    public function __construct(
        protected SchedulingRepositoryInterface $schedulingRepository,
        protected UserRepositoryInterface $userRepository,
    ) {
    }
    public function allWeekDays()
    {
        return new Response(
            true,
            null,
            $this->schedulingRepository->allWeekDays()
        );
    }
    public function paginateDoctorsWorkSchedules(bool $withExpired, bool $withUnactiveDoctors, int $perPage = 10): Response
    {
        $records = $this->schedulingRepository->paginateDoctorsWorkSchedules($withExpired, $withUnactiveDoctors, $perPage);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function paginateMedicalCenterWorkSchedules(bool $withExpired = false, int $perPage = 10): Response
    {
        $records = $this->schedulingRepository->paginateMedicalCenterWorkSchedules($withExpired, $perPage);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function paginateDoctorWorkSchedules(int $doctorId, bool $withExpired = false, int $perPage = 10): Response
    {
        $records = $this->schedulingRepository->paginateDoctorWorkSchedules($doctorId, $withExpired, $perPage);

        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    private function handleDoctorWorkScheduleCreation(&$workScheduleDTO, &$dayWorkTimeDTOs, &$makerId, &$user)
    {
        $doctorScheduleSegments = [];
        $medicalCenterWorkSchedules = $this->schedulingRepository->allMedicalCenterWorkSchedules(false, false, true);
        foreach ($medicalCenterWorkSchedules as $medSch) {
            // Filling start_date of the segment, if the $doctorScheduleSegments array was empty, then it is the 
            // first segment, then it has the start_time the doctor wanted
            $start_date = empty($doctorScheduleSegments) ?
                Carbon::parse($workScheduleDTO->effective_from_date)->format('Y-m-d') :
                $medSch->effective_from_date->format('Y-m-d');

            // Avoiding modifing on "array $dayWorkTimeDTOs" the doctor sent because we will need it later, we avoid
            // modifing by switching from "Call By Reference" to "Call By Value"
            $dayWorkTimesDTOsArray = $dayWorkTimesDTOsArrayCopy = [];
            foreach ($dayWorkTimeDTOs as $dto) {
                $copy = DayWorkTimeDTO::copy($dto);
                $dayWorkTimesDTOsArray[] = $copy;
                $dayWorkTimesDTOsArrayCopy[] = $copy;
            }

            // We won't modify $medSch->dayWorkTimes so there is no problem with "Call By Reference"
            $medSchDayWorkTimes = $medSch->dayWorkTimes;
            $medSchDayWorkTimesMap = [];
            foreach ($medSchDayWorkTimes as $dayRecord)
                $medSchDayWorkTimesMap[$dayRecord->weekday_id] = $dayRecord;

            // Filter DTOs to only those weekdays present in the medical center schedule
            $filteredDTOs = [];
            foreach ($dayWorkTimesDTOsArrayCopy as $dayWorkTimeDTO)
                if (isset($medSchDayWorkTimesMap[$dayWorkTimeDTO->weekday_id]))
                    $filteredDTOs[] = $dayWorkTimeDTO;

            // Replace the working array with the filtered one
            $dayWorkTimesDTOsArray = $filteredDTOs;

            foreach ($dayWorkTimesDTOsArray as $dayWorkTimeDTO) {
                $weekdayId = $dayWorkTimeDTO->weekday_id;
                if (!isset($medSchDayWorkTimesMap[$weekdayId]))
                    continue;

                $medSchDay = $medSchDayWorkTimesMap[$weekdayId];
                if (Carbon::parse($dayWorkTimeDTO->start_time) < $medSchDay->start_time)
                    $dayWorkTimeDTO->start_time = $medSchDay->start_time;

                if (Carbon::parse($dayWorkTimeDTO->end_time) > $medSchDay->end_time)
                    $dayWorkTimeDTO->end_time = $medSchDay->end_time;
            }

            // This array has the final data we gonna store in database
            $doctorScheduleSegments[] = [
                'effective_from_date' => $start_date,
                'dayWorkTimesDTOsArray' => $dayWorkTimesDTOsArray,
            ];
        }

        foreach ($doctorScheduleSegments as $segment) {
            $isUpdated = $this->schedulingRepository->updateLastWorkScheduleExpireDate(
                Carbon::parse($segment['effective_from_date'])->subDay()->toDateString(),
                $workScheduleDTO->type,
                $makerId
            );
            if (!$isUpdated)
                throw new \Exception('Failed to update last work schedule, please try again');

            $workSchedule = $this->schedulingRepository->createWorkSchedule(WorkScheduleDTO::fromRequest([
                'effective_from_date' => $segment['effective_from_date'],
                'type' => $workScheduleDTO->type
            ]));
            if (!$workSchedule)
                throw new \Exception('Failed to create work schedule, please try again');

            $createdChildRecord =
                ($workScheduleDTO->type == WorkScheduleTypeEnum::DOCTOR) ?
                $this->schedulingRepository->createDoctorWorkSchedule($workSchedule->id, $makerId) :
                $this->schedulingRepository->createMedicalCenterWorkSchedule($workSchedule->id, $makerId);

            if (!$createdChildRecord)
                throw new \Exception('Failed to create work schedule, please try again');

            foreach ($segment['dayWorkTimesDTOsArray'] as $dayWorkTimeDTO) {
                $dayWorkTimeDTO->work_schedule_id = $workSchedule->id;
                $createdRecord = $this->schedulingRepository->createDayWorkTime($dayWorkTimeDTO);
                if (!$createdRecord)
                    throw new \Exception('Failed to create work schedule, please try again');
            }
        }
    }
    private function handleCenterWorkScheduleCreation(&$workScheduleDTO, &$dayWorkTimeDTOs, &$makerId)
    {
        $isUpdated = $this->schedulingRepository->updateLastWorkScheduleExpireDate(
            Carbon::parse($workScheduleDTO->effective_from_date)->subDay()->toDateString(),
            $workScheduleDTO->type,
            $makerId
        );
        if (!$isUpdated)
            throw new \Exception('Failed to update last work schedule, please try again');

        $workSchedule = $this->schedulingRepository->createWorkSchedule($workScheduleDTO);
        if (!$workSchedule)
            throw new \Exception('Failed to create work schedule, please try again');

        $createdRecord =
            ($workScheduleDTO->type == WorkScheduleTypeEnum::DOCTOR) ?
            $this->schedulingRepository->createDoctorWorkSchedule($workSchedule->id, $makerId) :
            $this->schedulingRepository->createMedicalCenterWorkSchedule($workSchedule->id, $makerId);

        if (!$createdRecord)
            throw new \Exception('Failed to create work schedule, please try again');

        foreach ($dayWorkTimeDTOs as $dayWorkTimeDTO) {
            $dayWorkTimeDTO->work_schedule_id = $workSchedule->id;
            $createdRecord = $this->schedulingRepository->createDayWorkTime($dayWorkTimeDTO);
            if (!$createdRecord)
                throw new \Exception('Failed to create work schedule, please try again');
        }
    }
    public function createWorkSchedule(
        WorkScheduleDTO $dto,
        array $dayWorkTimeDTOs,
        int $makerId,
    ): Response {
        foreach ($dayWorkTimeDTOs as $item)
            if (!$item instanceof DayWorkTimeDTO) {
                return new Response(
                    false,
                    Response::messageToArray('Back-End Error: Invalid data type in day work times array'),
                    null,
                    500
                );
            }

        $user = $this->userRepository->find($makerId);
        try {
            DB::transaction(function () use ($dto, $dayWorkTimeDTOs, $makerId, $user) {
                if ($user->role == UserRoleEnum::DOCTOR)
                    $this->handleDoctorWorkScheduleCreation($dto, $dayWorkTimeDTOs, $makerId, $user);
                else if ($user->role == UserRoleEnum::ADMIN)
                    $this->handleCenterWorkScheduleCreation($dto, $dayWorkTimeDTOs, $makerId);
            });
        } catch (\Exception $e) {
            return new Response(
                false,
                Response::messageToArray($e->getMessage()),
                null,
                500
            );
        }

        return new Response(
            true,
            $user->role == UserRoleEnum::DOCTOR ?
            Response::messageToArray('The schedule has been successfully created. Please note that if there were any conflicts between the ' .
                'added schedule and the existing medical center schedules, it has been adjusted to align with the center\'s work schedules, ' .
                'and also the added schedule might have been split into several schedules to align. Please check your schedule list') :
            Response::messageToArray('Work schedule created successfully'),
            null,
            201
        );
    }
    public function findWorkSchedule(int $id, $failIfNotExists = true): Response
    {
        return new Response(
            true,
            null,
            $this->schedulingRepository->findWorkSchedule($id, $failIfNotExists)
        );
    }

}