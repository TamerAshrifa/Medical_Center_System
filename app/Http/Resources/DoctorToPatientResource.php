<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorToPatientResource extends JsonResource
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
            'user' => new UserToPatientResource($this->user),
            'appointment_duration' => $this->appointment_duration,
            'room' => new RoomToPatientResource($this->room),
        ];
    }
}
