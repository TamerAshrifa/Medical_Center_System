<?php

namespace App\Http\Resources\Patient;

use App\Http\Resources\BloodType\BloodTypeToAdminResource;
use App\Http\Resources\User\UserToAdminResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientToAdminResource extends JsonResource
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
            'allergies' => $this->allergies,
            'chronic_diseases' => $this->chronic_diseases,
            'user' => new UserToAdminResource($this->user),
            'blood_type' => new BloodTypeToAdminResource($this->bloodType),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
