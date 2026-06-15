<?php

namespace App\Http\Requests\WorkScheduleController;

use App\Enums\UserRoleEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\Models\Appointment;
use App\Repositories\Interfaces\SchedulingRepositoryInterface;
use App\Repositories\SchedulingRepository;
use App\Services\SchedulingService;
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


    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $lastAppointmentDatetime = Appointment::max('datetime');

            if ($lastAppointmentDatetime) {
                $lastAppointmentDatetime = Carbon::parse($lastAppointmentDatetime)->toDateString();
                if ($lastAppointmentDatetime > $this->input('effective_from_date'))
                    $validator->errors()->add(
                        'effective_from_date',
                        "The effective from date must be after the last made appointment date (after $lastAppointmentDatetime)"
                    );
            }

            $user = Auth::user();

            $schedulingRepository = new SchedulingRepository();
            $lastWorkSchedule = $user->role === UserRoleEnum::ADMIN ?
                $schedulingRepository->findLastMedicalCenterWorkSchedule(false) :
                $schedulingRepository->findLastDoctorWorkSchedule(false, $user->doctor->id);
            if ($lastWorkSchedule && $this->has('effective_from_date')) {
                $effective_from_date = \DateTime::createFromFormat('Y-m-d', $this->input('effective_from_date'));
                if ($effective_from_date)
                    if (Carbon::parse($this->input('effective_from_date')) <= $lastWorkSchedule->effective_from_date) {
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

        });
    }
}
