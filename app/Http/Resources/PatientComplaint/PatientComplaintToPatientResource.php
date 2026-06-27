<?php

namespace App\Http\Resources\PatientComplaint;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientComplaintToPatientResource extends JsonResource
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
            'content' => $this->content,
            'status' => $this->status,
            'reply' => $this->reply,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'responsed at' => $this->created_at === $this->updated_at ? null : $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
