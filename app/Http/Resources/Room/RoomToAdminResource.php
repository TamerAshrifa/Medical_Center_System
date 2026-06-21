<?php

namespace App\Http\Resources\Room;

use App\Http\Resources\Admin\AdminToAdminResource;
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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'monthly_rent' => $this->monthly_rent,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'last_update_by_admin' => new AdminToAdminResource($this->lastUpdateByAdmin),
        ];
    }
}
