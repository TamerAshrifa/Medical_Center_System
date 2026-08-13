<?php

namespace App\Http\Resources\MonthlyReport;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MonthlyReportToAdmin extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $adminUser = $this->madeByAdmin->user;
        return [
            'id' => $this->id,
            'made_by_admin_id' => $this->made_by_admin_id,
            'made_by_admin_fullname' => $adminUser->first_name . ' ' . $adminUser->last_name,
            'new_patients_count' => $this->new_patients_count,
            'appointments_count' => $this->appointments_count,
            'visits_count' => $this->visits_count,
            'visits_to_appointments_rate' => $this->visits_to_appointments_rate . ' %',
            'name' => $this->name,
            'peak_hours' => $this->peak_hours,
            'busy_days' => $this->busy_days,
            'transfers_count' => $this->transfers_count,
            'complaints_count' => $this->complaints_count,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
