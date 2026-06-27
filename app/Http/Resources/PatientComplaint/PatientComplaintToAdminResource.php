<?php

namespace App\Http\Resources\PatientComplaint;

use App\Models\Admin;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientComplaintToAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $userId = Patient::where('id', $this->patient_id)->valueOrFail('user_id');
        $patientUser = User::where('id', $userId)->firstOrFail(['first_name', 'last_name']);
        $patientFullname = $patientUser->first_name . ' ' . $patientUser->last_name;

        $adminFullname = null;

        if ($this->reviewed_by_admin_id) {
            $userId = Admin::where('id', $this->reviewed_by_admin_id)->valueOrFail('user_id');
            $adminUser = User::where('id', $userId)->firstOrFail(['first_name', 'last_name']);
            $adminFullname = $adminUser->first_name . ' ' . $adminUser->last_name;
        }

        return [
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'patient_fullname' => $patientFullname,
            'content' => $this->content,
            'status' => $this->status,
            'reviewed_by_admin_id' => $this->reviewed_by_admin_id,
            'admin_fullname' => $adminFullname,
            'reply' => $this->reply,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
