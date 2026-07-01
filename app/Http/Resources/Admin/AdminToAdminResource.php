<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminToAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $addedByAdminFullname = $this->addedByAdmin ?
            $this->addedByAdmin->user->first_name . ' ' . $this->addedByAdmin->user->last_name :
            null;
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user_fullname' => $this->user->first_name . ' ' . $this->user->last_name,
            'added_by_admin_id' => $this->added_by_admin_id,
            'added_by_admin_fullname' => $addedByAdminFullname,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
