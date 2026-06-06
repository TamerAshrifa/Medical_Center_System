<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserToAdminResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender ? 'Male' : 'Female',
            'photo' => $this->photo,
            'username' => $this->username,
            'role' => $this->role,
            'email_verified_at' => $this->email_verified_at,
            'created_at' => $this->created_at,
            'last_update_at' => $this->updated_at,
        ];
    }
}
