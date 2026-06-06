<?php

namespace App\Http\Requests\PatientController;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
            'blood_type_id' => ['sometimes', 'integer', 'exists:blood_types,id'],
            'allergies' => ['sometimes', 'string'],
            'chronic_diseases' => ['sometimes', 'string'],
        ];
    }
}
