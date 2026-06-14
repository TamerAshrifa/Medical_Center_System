<?php

namespace App\Services;

use App\DTOs\DayWorkTime\DayWorkTimeDTO;
use App\DTOs\WorkScheduleDTO\WorkScheduleDTO;
use App\Enums\WorkScheduleTypeEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Repositories\Interfaces\SchedulingRepositoryInterface;
use Carbon\Carbon;
use DB;

class SchedulingService extends Service
{
    public function __construct(
        protected SchedulingRepositoryInterface $schedulingRepository,
    ) {
    }
    public function allWeekDays()
    {
        return $this->schedulingRepository->allWeekDays();
    }

    public function paginateDoctorsWorkSchedules(int $per_page = 10): Response
    {
        $doctorsWorkSchedules = $this->schedulingRepository->paginateDoctorsWorkSchedules($per_page);
        $items = $doctorsWorkSchedules->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "result" => "Success",
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
    public function paginateMedicalCenterWorkSchedules(int $per_page = 10): Response
    {
        $medicalCenterWorkSchedules = $this->schedulingRepository->paginateMedicalCenterWorkSchedules($per_page);
        $items = $medicalCenterWorkSchedules->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                'result' => 'Success',
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
    public function paginateWorkSchedules(int $per_page = 10): Response
    {
        $workSchedules = $this->schedulingRepository->paginateWorkSchedules($per_page);
        $items = $workSchedules->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                'result' => 'Success',
                'current_page_number' => $workSchedules->currentPage(),
                'last_page_number' => $workSchedules->lastPage(),
                'records_per_page' => $workSchedules->perPage(),
                'next_page_url' => $workSchedules->nextPageUrl(),
                'previous_page_url' => $workSchedules->previousPageUrl(),
                'first_page_url' => $workSchedules->url(1),
                'last_page_url' => $workSchedules->url($workSchedules->lastPage()),
                'total_records_number' => $workSchedules->total(),
            ],
            $items
        );
    }

    public function paginateDoctorWorkSchedules(int $doctorId, bool $withExpired = false, int $per_page = 10): Response
    {
        $doctorWorkSchedules = $this->schedulingRepository->paginateDoctorWorkSchedules($doctorId, $withExpired, $per_page);

        $items = $doctorWorkSchedules->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "result" => "Success",
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
        $workSchedule = null;
        try {
            DB::transaction(function () use ($workScheduleDTO, $dayWorkTimeDTOs, $makerId, &$workSchedule) {

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
            });
        } catch (\Exception $e) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray($e->getMessage()),
                null,
                400
            );
        }

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Work schedule created successfully'),
            null,
            201
        );
    }

}