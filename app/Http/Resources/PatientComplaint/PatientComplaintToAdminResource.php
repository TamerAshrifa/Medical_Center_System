<?php

namespace App\Http\Resources\PatientComplaint;

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
        $adminFullname = null;
        if ($this->reviewed_by_admin_id) {
            $adminFullname = $this->reviewedByAdmin->user->first_name . ' ' .
                $this->reviewedByAdmin->user->last_name;
        }
        return [
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'patient_fullname' => $this->patient->user->first_name . ' ' .
                $this->patient->user->last_name,
            'content' => $this->content,
            'status' => $this->status,
            'reviewed_by_admin_id' => $this->reviewed_by_admin_id,
            'reviewed_by_admin_fullname' => $adminFullname,
            'reply' => $this->reply,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'responsed_at' => $this->created_at === $this->updated_at ? null : $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
