<?php

namespace App\Http\Resources\Doctor;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorToAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user_fullname' => $this->user->first_name . ' ' . $this->user->last_name,
            'appointment_duration' => $this->appointment_duration,
            'is_active' => $this->is_active,
            'room_id' => $this->room_id,
            'room_name' => $this->room->name,
            'added_by_admin_id' => $this->added_by_admin_id,
            'added_by_admin_fullname' => $this->addedByAdmin->user->first_name . ' ' .
                $this->addedByAdmin->user->last_name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
