<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserToPatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $toReturn = [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'date_of_birth' => $this->date_of_birth->format('Y-m-d'),
            'gender' => $this->gender ? 'Male' : 'Female',
            'photo' => $this->photo,
            'username' => $this->username,
            'role' => $this->role,
        ];

        if ($this->whenLoaded($this->role->value)) {
            $roleRecordField = $this->role->value . '_id';
            $toReturn["$roleRecordField"] = $this->{$this->role->value}->id;
        }

        return $toReturn;
    }
}
