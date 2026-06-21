<?php

namespace App\Http\Resources\Doctor;

use App\Http\Resources\Admin\AdminToAdminResource;
use App\Http\Resources\Room\RoomToAdminResource;
use App\Http\Resources\User\UserToAdminResource;
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
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
