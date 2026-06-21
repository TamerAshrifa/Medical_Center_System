<?php

namespace App\Http\Resources\Doctor;

use App\Http\Resources\Room\RoomWithoutAdminToAdminResource;
use App\Http\Resources\User\UserToAdminResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorWithoutAdderAdminToAdminResource extends JsonResource
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
            'appointment_duration' => $this->appointment_duration,
            'added_by_admin_id' => $this->added_by_admin_id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'user' => new UserToAdminResource($this->user),
            'room' => new RoomWithoutAdminToAdminResource($this->room),
        ];
    }
}
