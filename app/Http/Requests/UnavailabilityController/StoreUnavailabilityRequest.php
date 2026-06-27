<?php

namespace App\Http\Requests\UnavailabilityController;

use App\Enums\UnavailabilityReasonTypeEnum;
use App\Enums\UserRoleEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class StoreUnavailabilityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $userRole = Auth::user()->role;
        return $userRole == UserRoleEnum::ADMIN || $userRole == UserRoleEnum::DOCTOR;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'from_date' => ['required', 'date_format:Y-m-d'],
            'to_date' => ['required', 'date_format:Y-m-d'],
            'reason_type' => ['required', new Enum(UnavailabilityReasonTypeEnum::class)],
            'justification' => ['nullable', 'string'],
        ];
    }
}
