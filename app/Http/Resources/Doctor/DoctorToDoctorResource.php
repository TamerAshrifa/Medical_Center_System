<?php

namespace App\Http\Resources\Doctor;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorToDoctorResource extends JsonResource
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
            'room_id' => $this->room_id,
            'room_name' => $this->room->name,
        ];

    }
}
