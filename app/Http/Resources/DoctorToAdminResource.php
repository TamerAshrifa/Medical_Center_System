<?php

namespace App\Http\Resources;

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
            'user' => new UserToAdminResource($this->user),
            'appointment_duration' => $this->appointment_duration,
            'room' => new RoomToAdminResource($this->room),
            'added_by_admin' => new AdminToAdminResource($this->addedByAdmin),
        ];
    }
}
