<?php

namespace App\Http\Resources\Unavailability;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnavailabilityToDoctorResource extends JsonResource
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
            'from_date' => $this->from_date->format('Y-m-d'),
            'to_date' => $this->to_date->format('Y-m-d'),
            'reason_type' => $this->reason_type,
            'justification' => $this->justification,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
