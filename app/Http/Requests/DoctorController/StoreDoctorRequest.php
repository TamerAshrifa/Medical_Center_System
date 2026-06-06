<?php

namespace App\Http\Requests\DoctorController;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id', 'unique:doctors,user_id'],
            'room_id' => ['required', 'integer', 'exists:rooms,id', 'unique:doctors,room_id'],
            'appointment_duration' => ['required', 'integer', 'min:1'],
        ];
    }
}
