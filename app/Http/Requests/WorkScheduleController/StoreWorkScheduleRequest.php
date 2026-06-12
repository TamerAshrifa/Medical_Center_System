<?php

namespace App\Http\Requests\WorkScheduleController;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

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
            'effective_from_date' => ['required', 'date'],
            'effective_to_date' => ['required', 'date', 'after_or_equal:effective_from_date'],
            'days' => ['required', 'array', 'min:1', 'max:7'],
            'days.*.weekday_id' => ['required', 'integer', 'exists:week_days,id', 'distinct'],
            'days.*.start_time' => ['required', 'date_format:H:i'],
            'days.*.end_time' => ['required', 'date_format:H:i'],
        ];

    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $days = $this->input('days', []);
            foreach ($days as $index => $day) {
                if (!isset($day['start_time']) || !isset($day['end_time']))
                    continue;

                $startObj = \DateTime::createFromFormat('H:i', $day['start_time']);
                $endObj = \DateTime::createFromFormat('H:i', $day['end_time']);

                if (!$startObj || !$endObj)
                    continue;

                if ($endObj <= $startObj)
                    $validator->errors()->add("days.$index.end_time", 'The end time must be after the start time.');
            }
        });
    }
}
