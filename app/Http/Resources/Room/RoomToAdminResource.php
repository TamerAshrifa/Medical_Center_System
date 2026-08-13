<?php

namespace App\Http\Resources\Room;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomToAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $returned = [
            'id' => $this->id,
            'name' => $this->name,
            'monthly_rent' => $this->monthly_rent,
            'last_update_by_admin_id' => $this->last_update_by_admin_id,
            'last_update_by_admin_fullname' => $this->lastUpdateByAdmin->user->first_name . ' ' .
                $this->lastUpdateByAdmin->user->last_name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];

        if ($this->whenloaded('doctor') && $this->doctor)
            $returned['doctor'] = [
                'doctor_id' => $this->doctor->id,
                'user_id' => $this->doctor->user_id,
                'fullname' => $this->doctor->user->first_name . ' ' . $this->doctor->user->last_name,
                'photo' => $this->doctor->user->photo,
            ];

        return $returned;
    }
}
