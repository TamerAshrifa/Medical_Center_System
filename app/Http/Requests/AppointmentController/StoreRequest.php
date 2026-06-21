<?php

namespace App\Http\Requests\AppointmentController;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'datetime' => [
                'required',
                'date_format:Y-m-d H:i',
                'after_or_equal:' . now()->format('Y-m-d H:i'),
            ],
        ];
    }
}
