<?php

namespace App\Http\Requests\AppointmentController;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MakeAppointmentAttendedRequest extends FormRequest
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
            'actual_time' => ['required', 'date_format:Y-m-d H:i', 'after_or_equal:' . Carbon::today()],
            'medical_diagnosis' => ['required', 'string', 'max:500'],
            'prescription' => ['required', 'string', 'max:250'],
            'notes' => ['required', 'string', 'max:1000'],
            'notes_for_other_doctors' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
