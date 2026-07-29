<?php

namespace App\Http\Requests\WorkScheduleController;

use App\Enums\UserRoleEnum;
use App\Models\Appointment;
use App\Repositories\Interfaces\SchedulingRepositoryInterface;
use App\Repositories\SchedulingRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreWorkScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'effective_from_date' => [
                'required',
                'date_format:Y-m-d',
                'after:' . now()->format('Y-m-d'),
            ],
            'days' => ['required', 'array', 'min:1', 'max:7'],
            'days.*.weekday_id' => ['required', 'integer', 'between:1,7', 'exists:week_days,id', 'distinct'],
            'days.*.start_time' => ['required', 'date_format:H:i'],
            'days.*.end_time' => ['required', 'date_format:H:i'],
        ];
    }
    public function messages(): array
    {
        return [
            'effective_from_date.after' => 'The effective from date field must be after today',
        ];
    }
    private function handleGeneralValidation(Validator &$validator, $user, SchedulingRepositoryInterface $schedulingRepository): void
    {
        $lastAppointmentDatetime = Appointment::max('datetime');

        if ($lastAppointmentDatetime && $this->has('effective_from_date')) {
            $lastAppointmentDatetime = Carbon::parse($lastAppointmentDatetime)->toDateString();
            if ($lastAppointmentDatetime > $this->input('effective_from_date'))
                $validator->errors()->add(
                    'effective_from_date',
                    "The effective from date must be after the last made appointment date (after $lastAppointmentDatetime)"
                );
        }

        $lastWorkSchedule = $user->role === UserRoleEnum::ADMIN ?
            $schedulingRepository->findLastMedicalCenterWorkSchedule(false) :
            $schedulingRepository->findLastDoctorWorkSchedule(false, $user->doctor->id);
        if ($lastWorkSchedule && $this->has('effective_from_date')) {
            $effective_from_date = \DateTime::createFromFormat('Y-m-d', $this->input('effective_from_date'));
            if ($effective_from_date)
                if (
                    Carbon::parse($this->input('effective_from_date'))->format('Y-m-d') <=
                    Carbon::parse($lastWorkSchedule->effective_from_date)->format('Y-m-d')
                ) {
                    $lastScheduleDate = $lastWorkSchedule->effective_from_date->toDateString();
                    $validator->errors()->add(
                        'effective_from_date',
                        "The effective from date must start after the last schedule date (after $lastScheduleDate)"
                    );
                }
        }

        $days = $this->input('days', []);
        foreach ($days as $index => $day) {
            // The next 6 lines are Defensive Checks
            if (!isset($day['start_time']) || !isset($day['end_time']))
                continue;
            $startTime = \DateTime::createFromFormat('H:i', $day['start_time']);
            $endTime = \DateTime::createFromFormat('H:i', $day['end_time']);
            if (!$startTime || !$endTime)
                continue;

            if ($endTime <= $startTime)
                $validator->errors()->add("days.$index.end_time", 'The end time must be after the start time');
        }

    }
    private function handleAdminValidation(Validator &$validator, SchedulingRepositoryInterface $schedulingRepository): void
    {
        if ($this->has(['effective_from_date']) && \DateTime::createFromFormat('Y-m-d', $this->input('effective_from_date'))) {
            $dbDates = $schedulingRepository->getDoctorsNotExpiredWorkSchedulesContainOrAfterDate(
                Carbon::parse($this->input('effective_from_date'))->format('Y-m-d')
            );

            $days = $this->input('days', []);
            foreach ($days as $index => $day) {
                if (!isset($day['start_time']) || !isset($day['end_time']) || !isset($day['weekday_id']))
                    continue;
                if (
                    !\DateTime::createFromFormat('H:i', $day['start_time']) ||
                    !\DateTime::createFromFormat('H:i', $day['end_time']) ||
                    !is_int($day['weekday_id'])
                )
                    continue;

                $dayInDB = null;
                foreach ($dbDates as $d)
                    if ($d->weekday_id == $day['weekday_id']) {
                        $dayInDB = $d;
                        break;
                    }
                if (!$dayInDB)
                    continue;

                $addedStartTime = Carbon::parse($day['start_time']);
                $dbStartTime = $dayInDB->start_time;
                $addedEndTime = Carbon::parse($day['end_time']);
                $dbEndTime = $dayInDB->end_time;

                if ($addedStartTime > $dbStartTime)
                    $validator->errors()->add("days.$index.start_time", 'The start time of this day must be before or '
                        . "equal to $dbStartTime because there is a doctor works at this time");
                if ($addedEndTime > $dbEndTime)
                    $validator->errors()->add("days.$index.end_time", 'The end time of this day must be after or '
                        . "equal to $dbEndTime because there is a doctor works at this time");
            }
        }
    }
    private function handleDoctorValidation(Validator &$validator, SchedulingRepositoryInterface $schedulingRepository): void
    {
        $oldestActiveCenterWorkSchedule = $schedulingRepository->findOldestMedicalCenterWorkSchedule();
        if (!$oldestActiveCenterWorkSchedule)
            return;
        if (!$this->has('effective_from_date'))
            return;
        $effective_from_date = \DateTime::createFromFormat('Y-m-d', $this->input('effective_from_date'));
        if (!$effective_from_date)
            return;

        if (
            Carbon::parse($this->input('effective_from_date'))->format('Y-m-d') <
            Carbon::parse($oldestActiveCenterWorkSchedule->effective_from_date)->format('Y-m-d')
        ) {
            $oldestActiveCenterWorkSchedule = $oldestActiveCenterWorkSchedule->effective_from_date->toDateString();
            $validator->errors()->add(
                'effective_from_date',
                "The effective from date must start after or on the oldest active schedule date ($oldestActiveCenterWorkSchedule)"
            );
        }


    }
    public function withValidator(Validator $validator, SchedulingRepositoryInterface $schedulingRepository): void
    {
        $validator->after(function (Validator $validator) use ($schedulingRepository) {
            $user = Auth::user();

            $this->handleGeneralValidation($validator, $user, $schedulingRepository);

            if ($user->role === UserRoleEnum::DOCTOR)
                $this->handleDoctorValidation($validator, $schedulingRepository);
            else if ($user->role === UserRoleEnum::ADMIN)
                $this->handleAdminValidation($validator, $schedulingRepository);
        });
    }
}
