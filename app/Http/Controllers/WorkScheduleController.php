<?php

namespace App\Http\Controllers;

use App\DTOs\DayWorkTime\DayWorkTimeDTO;
use App\DTOs\WorkScheduleDTO\WorkScheduleDTO;
use App\Enums\UserRoleEnum;
use App\Enums\WorkScheduleTypeEnum;
use App\Http\Requests\WorkScheduleController\StoreWorkScheduleRequest;
use App\Services\SchedulingService;
use Illuminate\Support\Facades\Auth;

class WorkScheduleController extends Controller
{

    /**
     * @group Doctor_Speciality APIs
     */
    public function __construct(
        protected SchedulingService $schedulingService,
    ) {
    }


    /**
     * Creating a Work Scheduling
     * 
     * ###For: Mobile(Doctor), Web
     * Only admins and doctors are allowed to use this API.
     * Creating a new Work Scheduling by a doctor or admin, the doctor can create his own work schedule, and the admin can create work schedules for medical center.
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
        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);

    }




}
