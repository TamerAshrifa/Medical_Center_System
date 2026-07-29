<?php

namespace App\Http\Controllers;

use App\DTOs\DayWorkTime\DayWorkTimeDTO;
use App\DTOs\WorkScheduleDTO\WorkScheduleDTO;
use App\Enums\UserRoleEnum;
use App\Enums\WorkScheduleTypeEnum;
use App\Http\Requests\WorkScheduleController\StoreWorkScheduleRequest;
use App\Http\Resources\WeekDay\WeekDayToAdminResource;
use App\Http\Resources\WeekDay\WeekDayToDoctorResource;
use App\Http\Resources\WeekDay\WeekDayToPatientResource;
use App\Http\Resources\WorkSchedule\WorkScheduleToDoctorResource;
use App\Http\Resources\WorkSchedule\WorkScheduleToAdminResource;
use App\Repositories\Interfaces\SchedulingRepositoryInterface;
use App\Services\SchedulingService;
use Illuminate\Support\Facades\Auth;

/**
 * @group Scheduling APIs
 */
class WorkScheduleController extends Controller
{
    public function __construct(
        protected SchedulingRepositoryInterface $SchedulingRepository,
        protected SchedulingService $schedulingService,
    ) {
    }


    private function weekDayResource($weekDayOrCollectionOfIt, bool $isCollection)
    {
        switch ($this->currentUserRole()) {
            case UserRoleEnum::ADMIN:
                return $isCollection ?
                    WeekDayToAdminResource::collection($weekDayOrCollectionOfIt) :
                    new WeekDayToAdminResource($weekDayOrCollectionOfIt);
            case UserRoleEnum::DOCTOR:
                return $isCollection ?
                    WeekDayToDoctorResource::collection($weekDayOrCollectionOfIt) :
                    new WeekDayToDoctorResource($weekDayOrCollectionOfIt);
            case UserRoleEnum::PATIENT:
                return $isCollection ?
                    WeekDayToPatientResource::collection($weekDayOrCollectionOfIt) :
                    new WeekDayToPatientResource($weekDayOrCollectionOfIt);
            default:
                return $isCollection ?
                    WeekDayToPatientResource::collection($weekDayOrCollectionOfIt) :
                    new WeekDayToPatientResource($weekDayOrCollectionOfIt);
        }
    }
    private function workScheduleResource($recordOrCollection, bool $isCollection)
    {
        switch ($this->currentUserRole()) {
            case UserRoleEnum::ADMIN:
                return $isCollection ?
                    WorkScheduleToAdminResource::collection($recordOrCollection) :
                    new WorkScheduleToAdminResource($recordOrCollection);
            case UserRoleEnum::DOCTOR:
                return $isCollection ?
                    WorkScheduleToDoctorResource::collection($recordOrCollection) :
                    new WorkScheduleToDoctorResource($recordOrCollection);
            default:
                return $isCollection ?
                    WorkScheduleToDoctorResource::collection($recordOrCollection) :
                    new WorkScheduleToDoctorResource($recordOrCollection);
        }
    }

    /**
     * Creating a Work Scheduling
     * 
     * ###For: Mobile(Doctor), Web
     * Only admins and doctors are allowed to use this API
     * Creating a new Work Scheduling by a doctor or admin, the doctor can create his own work schedule, 
     * and the admin can create work schedules for medical center.
     */
    public function store(StoreWorkScheduleRequest $request)
    {
        $validatedData = $request->validated();
        $workScheduleDTOData = [
            'effective_from_date' => $validatedData['effective_from_date'],
            'type' => Auth::user()->role === UserRoleEnum::ADMIN ?
                WorkScheduleTypeEnum::MEDICAL_CENTER : WorkScheduleTypeEnum::DOCTOR,
        ];

        $days = $validatedData['days'];
        $dayWorkTimeDTOs = [];
        foreach ($days as $day) {
            $dayWorkTimeDTOs[] = DayWorkTimeDTO::fromRequest([
                'weekday_id' => $day['weekday_id'],
                'start_time' => $day['start_time'],
                'end_time' => $day['end_time'],
            ]);
        }
        $user = Auth::user();

        $response = $this->schedulingService->createWorkSchedule(
            WorkScheduleDTO::fromRequest($workScheduleDTOData),
            $dayWorkTimeDTOs,
            $user->role === UserRoleEnum::ADMIN ?
            $user->admin->id : $user->doctor->id
        );
        return $this->jsonResponse($response);
    }

    /**
     * View all days of week
     * 
     * ###For: Mobile(Patient, Doctor), Web
     * Everyone in the system is allowed to use this API
     */
    public function indexWeekDays()
    {
        $response = $this->schedulingService->allWeekDays();
        if ($response->data)
            $response->data = $this->weekDayResource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View all work schedules of all doctors
     * 
     * ###For: Web
     * Only admins are allowed to use this API
     * @urlParam with_expired integer required Boolean value means does the user want all of schedules to be showen even with expired ones or only non-expired schedules?
     * @urlParam with_unactive_doctors integer required Boolean value means does the Admin want all of schedules to be showen even with of the unactive doctors?
     */
    public function paginateDoctorsWorkSchedules(bool $with_expired, bool $with_unactive_doctors)
    {
        $response = $this->schedulingService->paginateDoctorsWorkSchedules($with_expired, $with_unactive_doctors);
        if ($response->data)
            $response->data = $this->workScheduleResource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View all work schedules of the medical center
     * 
     * ###For: Web
     * Only admins are allowed to use this API
     * @urlParam with_expired integer required Boolean value means does the user want all of schedules to be showen even with expired ones or only non-expired schedules?
     */
    public function paginateMedicalCenterWorkSchedules(bool $with_expired)
    {
        $response = $this->schedulingService->paginateMedicalCenterWorkSchedules($with_expired);
        if ($response->data)
            $response->data = $this->workScheduleResource($response->data, true);
        return $this->jsonResponse($response);
    }


    /**
     * View all work schedules of a specified doctor
     * 
     * ###For: Web, Mobile(Doctor)
     * Only admins and doctors are allowed to use this API
     * @urlParam doctor_id integer required min:1 The ID of the doctor to view his schedules 
     * @urlParam with_expired integer required Boolean value means does the user want all of schedules to be showen even with expired ones or only non-expired schedules?
     */
    public function paginateDoctorWorkSchedules(int $doctor_id, bool $with_expired)
    {
        $response = $this->schedulingService->paginateDoctorWorkSchedules($doctor_id, $with_expired);
        if ($response->data)
            $response->data = $this->workScheduleResource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View all work schedules of a specified doctor
     * 
     * ###For: Web, Mobile(Doctor)
     * Only admins and doctors are allowed to use this API
     * @urlParam id integer required The ID of the work schedule to view
     */
    public function findWorkSchedule(int $id)
    {
        $response = $this->schedulingService->findWorkSchedule($id, true);
        if ($response->data)
            $response->data = $this->workScheduleResource($response->data, false);
        return $this->jsonResponse($response);
    }

}
