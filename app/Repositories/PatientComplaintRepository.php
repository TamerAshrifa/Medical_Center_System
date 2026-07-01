<?php

namespace App\Repositories;

use App\DTOs\PatientComplaint\PatientComplaintDTO;
use App\Enums\PatientComplaintStatusEnum;
use App\Models\PatientComplaint;
use App\Repositories\Interfaces\PatientComplaintRepositoryInterface;

class PatientComplaintRepository extends Repository implements PatientComplaintRepositoryInterface
{
    private $with = [
        'patient:id,user_id',
        'patient.user:id,first_name,last_name',
        'reviewedByAdmin:id,user_id',
        'reviewedByAdmin.user:id,first_name,last_name',
    ];
    public function paginate(int $perPage = 10, bool $withReviewed = true)
    {
        return PatientComplaint::query()
            ->with($this->with)
            ->when(!$withReviewed, fn($q) => $q->whereNot('status', PatientComplaintStatusEnum::REVIEWED->value))
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }
    public function allPatientComplaints(int $patientId)
    {
        return PatientComplaint::query()
            ->with($this->with)
            ->where('patient_id', $patientId)
            ->orderByDesc('created_at')
            ->get();
    }

    public function find($failIfNotExists = true, int $id): PatientComplaint|null
    {
        return $failIfNotExists ? PatientComplaint::findOrFail($id) : PatientComplaint::find($id);
    }
    public function create(PatientComplaintDTO $dto): PatientComplaint
    {
        return PatientComplaint::create($dto->toArray());
    }
    public function makePatientComplaintReviewed(string $reply, int $reviewedByAdminId, int $id): bool
    {
        return PatientComplaint::findOrFail($id)->update([
            'reply' => $reply,
            'reviewed_by_admin_id' => $reviewedByAdminId,
            'status' => PatientComplaintStatusEnum::REVIEWED->value,
        ]);
    }
    public function isReviewed(int $id): bool
    {
        return PatientComplaint::
            where('id', $id)
            ->where('status', PatientComplaintStatusEnum::REVIEWED->value)
            ->exists();
    }
}
