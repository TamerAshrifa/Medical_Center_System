<?php

namespace App\Http\Resources\Doctor;

use App\Http\Resources\Room\RoomToDoctorResource;
use App\Http\Resources\User\UserToDoctorResource;
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
            'user' => new UserToDoctorResource($this->user),
            'appointment_duration' => $this->appointment_duration,
            'room' => new RoomToDoctorResource($this->room),
        ];
    }
}
