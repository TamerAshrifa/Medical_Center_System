<?php

namespace App\Http\Requests\DoctorSpeciality;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorSpecialityRequest extends FormRequest
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
            'speciality_id' => ['required', 'integer', 'exists:specialities,id'],
            'experience_starting_date' => ['required', 'date'],
            'view_experience' => ['required', 'boolean'],
        ];
    }
}
