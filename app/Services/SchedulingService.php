<?php

namespace App\Services;

use App\DTOs\DayWorkTime\DayWorkTimeDTO;
use App\DTOs\WorkScheduleDTO\WorkScheduleDTO;
use App\Enums\UserRoleEnum;
use App\Enums\WorkScheduleTypeEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
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
            ResponseStatusEnum::SUCCESS,
            null,
            $this->schedulingRepository->allWeekDays()
        );
    }
    public function paginateDoctorsWorkSchedules(bool $withExpired, int $per_page = 10): Response
    {
        $doctorsWorkSchedules = $this->schedulingRepository->paginateDoctorsWorkSchedules($withExpired, $per_page);
        $items = $doctorsWorkSchedules->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "current_page_number" => $doctorsWorkSchedules->currentPage(),
                "last_page_number" => $doctorsWorkSchedules->lastPage(),
                "records_per_page" => $doctorsWorkSchedules->perPage(),
                "next_page_url" => $doctorsWorkSchedules->nextPageUrl(),
                "previous_page_url" => $doctorsWorkSchedules->previousPageUrl(),
                "first_page_url" => $doctorsWorkSchedules->url(1),
                "last_page_url" => $doctorsWorkSchedules->url($doctorsWorkSchedules->lastPage()),
                "total_records_number" => $doctorsWorkSchedules->total(),
            ],
            $items
        );
    }
    public function paginateMedicalCenterWorkSchedules(bool $withExpired = false, int $per_page = 10): Response
    {
        $medicalCenterWorkSchedules = $this->schedulingRepository->paginateMedicalCenterWorkSchedules($withExpired, $per_page);
        $items = $medicalCenterWorkSchedules->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                'current_page_number' => $medicalCenterWorkSchedules->currentPage(),
                'last_page_number' => $medicalCenterWorkSchedules->lastPage(),
                'records_per_page' => $medicalCenterWorkSchedules->perPage(),
                'next_page_url' => $medicalCenterWorkSchedules->nextPageUrl(),
                'previous_page_url' => $medicalCenterWorkSchedules->previousPageUrl(),
                'first_page_url' => $medicalCenterWorkSchedules->url(1),
                'last_page_url' => $medicalCenterWorkSchedules->url($medicalCenterWorkSchedules->lastPage()),
                'total_records_number' => $medicalCenterWorkSchedules->total(),
            ],
            $items
        );
    }
    // public function paginateWorkSchedules(bool $withExpired = false, int $per_page = 10): Response
    // {
    //     $workSchedules = $this->schedulingRepository->paginateWorkSchedules($per_page);
    //     $items = $workSchedules->items();
    //     return new Response(
    //         ResponseStatusEnum::SUCCESS,
    //         [
    //             'result' => 'Success',
    //             'current_page_number' => $workSchedules->currentPage(),
    //             'last_page_number' => $workSchedules->lastPage(),
    //             'records_per_page' => $workSchedules->perPage(),
    //             'next_page_url' => $workSchedules->nextPageUrl(),
    //             'previous_page_url' => $workSchedules->previousPageUrl(),
    //             'first_page_url' => $workSchedules->url(1),
    //             'last_page_url' => $workSchedules->url($workSchedules->lastPage()),
    //             'total_records_number' => $workSchedules->total(),
    //         ],
    //         $items
    //     );
    // }


    public function paginateDoctorWorkSchedules(int $doctorId, bool $withExpired = false, int $per_page = 10): Response
    {
        $doctorWorkSchedules = $this->schedulingRepository->paginateDoctorWorkSchedules($doctorId, $withExpired, $per_page);

        $items = $doctorWorkSchedules->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "current_page_number" => $doctorWorkSchedules->currentPage(),
                "last_page_number" => $doctorWorkSchedules->lastPage(),
                "records_per_page" => $doctorWorkSchedules->perPage(),
                "next_page_url" => $doctorWorkSchedules->nextPageUrl(),
                "previous_page_url" => $doctorWorkSchedules->previousPageUrl(),
                "first_page_url" => $doctorWorkSchedules->url(1),
                "last_page_url" => $doctorWorkSchedules->url($doctorWorkSchedules->lastPage()),
                "total_records_number" => $doctorWorkSchedules->total(),
            ],
            $items
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
            $medSchDayWorkTimesDaysIDs = [];
            foreach ($medSchDayWorkTimes as $dayRecord)
                $medSchDayWorkTimesDaysIDs[] = $dayRecord->weekday_id;

            // Filter DTOs first and reindex so indexes stay consistent
            $filteredDTOs = [];
            foreach ($dayWorkTimesDTOsArrayCopy as $dayWorkTimeDTO)
                if (in_array($dayWorkTimeDTO->weekday_id, $medSchDayWorkTimesDaysIDs))
                    $filteredDTOs[] = $dayWorkTimeDTO;

            // Replace the working array with the filtered, reindexed one
            $dayWorkTimesDTOsArray = $filteredDTOs;

            // Ensure $medSchDayWorkTimes is a zero-based indexed array to match DTO indexes
            $medSchDayWorkTimesValues = $medSchDayWorkTimes->values()->all();

            foreach ($dayWorkTimesDTOsArray as $index => $dayWorkTimeDTO) {
                if (!isset($medSchDayWorkTimesValues[$index]))
                    continue;

                if (Carbon::parse($dayWorkTimeDTO->start_time) < $medSchDayWorkTimesValues[$index]->start_time)
                    $dayWorkTimesDTOsArray[$index]->start_time = $medSchDayWorkTimesValues[$index]->start_time;

                if (Carbon::parse($dayWorkTimeDTO->end_time) > $medSchDayWorkTimesValues[$index]->end_time)
                    $dayWorkTimesDTOsArray[$index]->end_time = $medSchDayWorkTimesValues[$index]->end_time;
                //     if ($medSch->end_time !== null && Carbon::parse($dayWorkTimeDTO->end_time) > Carbon::parse($medSch->end_time))
                //         $dayWorkTimesDTOsArray[$index]->end_time = $medSch->end_time;
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
        WorkScheduleDTO $workScheduleDTO,
        array $dayWorkTimeDTOs,
        int $makerId,
    ): Response {
        foreach ($dayWorkTimeDTOs as $item)
            if (!$item instanceof DayWorkTimeDTO) {
                return new Response(
                    ResponseStatusEnum::FAIL,
                    Response::messageToArray('Back-End Error: Invalid data type in day work times array'),
                    null,
                    500
                );
            }

        $user = $this->userRepository->findById($makerId);
        try {
            DB::transaction(function () use ($workScheduleDTO, $dayWorkTimeDTOs, $makerId, $user) {
                if ($user->role == UserRoleEnum::DOCTOR)
                    $this->handleDoctorWorkScheduleCreation($workScheduleDTO, $dayWorkTimeDTOs, $makerId, $user);
                else if ($user->role == UserRoleEnum::ADMIN)
                    $this->handleCenterWorkScheduleCreation($workScheduleDTO, $dayWorkTimeDTOs, $makerId);
            });
        } catch (\Exception $e) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray($e->getMessage()),
                null,
                500
            );
        }

        return new Response(
            ResponseStatusEnum::SUCCESS,
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
            ResponseStatusEnum::SUCCESS,
            null,
            $this->schedulingRepository->findWorkSchedule($id, $failIfNotExists)
        );
    }

}