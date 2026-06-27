<?php

namespace App\Repositories;

use App\DTOs\PatientComplaint\PatientComplaintDTO;
use App\Enums\PatientComplaintStatusEnum;
use App\Models\MedicalRecordAccess;
use App\Models\PatientComplaint;
use App\Repositories\Interfaces\PatientComplaintRepositoryInterface;

class PatientComplaintRepository extends Repository implements PatientComplaintRepositoryInterface
{

    public function paginate(int $per_page = 10, bool $withReviewed = true)
    {
        return PatientComplaint::
            when(!$withReviewed, fn($q) => $q->whereNot('status', PatientComplaintStatusEnum::REVIEWED->value))
            ->orderByDesc('created_at')
            ->paginate($per_page);
    }
    public function allPatientComplaints(int $patient_id)
    {
        return PatientComplaint::
            where('patient_id', $patient_id)
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
    public function makePatientComplaintReviewed(string $reply, int $reviewed_by_admin_id, int $id): bool
    {
        return PatientComplaint::findOrFail($id)->update([
            'reply' => $reply,
            'reviewed_by_admin_id' => $reviewed_by_admin_id,
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
