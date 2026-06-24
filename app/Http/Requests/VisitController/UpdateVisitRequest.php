<?php

namespace App\Http\Requests\VisitController;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVisitRequest extends FormRequest
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
            'medical_diagnosis' => ['sometimes', 'string', 'max:500'],
            'prescription' => ['sometimes', 'string', 'max:250'],
            'notes' => ['sometimes', 'string', 'max:1000'],
            'notes_for_other_doctors' => ['sometimes', 'string', 'max:1000'],
        ];
    }
}
