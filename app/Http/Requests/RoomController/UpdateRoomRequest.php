<?php

namespace App\Http\Requests\RoomController;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoomRequest extends FormRequest
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
            'name' => [
                'sometimes',
                'string',
                'max:20',
                Rule::unique('rooms', 'name')->ignore($this->route('roomId'))
            ],
            'monthly_rent' => ['sometimes', 'numeric', 'min:0'],
        ];
    }
}
