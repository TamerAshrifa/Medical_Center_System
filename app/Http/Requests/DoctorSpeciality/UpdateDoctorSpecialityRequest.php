<?php

namespace App\Http\Requests\DoctorSpeciality;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorSpecialityRequest extends FormRequest
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
            'experience_starting_date' => ['sometimes', 'date_format:Y-m-d'],
            'view_experience' => ['sometimes', 'boolean'],
        ];
    }
}
