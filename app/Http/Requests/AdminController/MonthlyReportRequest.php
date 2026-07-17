<?php

namespace App\Http\Requests\AdminController;

use App\Enums\UserRoleEnum;
use App\Enums\WorkScheduleTypeEnum;
use App\Models\WorkSchedule;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MonthlyReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->role == UserRoleEnum::ADMIN; // Only allow if the user is an admin
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $earliest_month = Carbon::parse(WorkSchedule::query()
            ->where('type', WorkScheduleTypeEnum::MEDICAL_CENTER->value)
            ->orderBy('effective_from_date')
            ->firstOrFail()
            ->value('effective_from_date'))->format('Y-m');
        // $today = Carbon::now()->subMonth()->format('Y-m');
        $late_month = Carbon::now()->format('Y-m');
        return [
            'date_of_month' => [
                'required',
                'date_format:Y-m',
                "before_or_equal:$late_month",
                "after_or_equal:$earliest_month"
            ],
        ];
    }
}
