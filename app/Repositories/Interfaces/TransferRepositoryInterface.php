<?php

namespace App\Repositories\Interfaces;

use App\DTOs\Transfer\TransferDTO;
use App\Models\Appointment;
use App\Models\Transfer;

interface TransferRepositoryInterface extends RepositoryInterface
{
    public function allPatientTransfers(bool $withAttended, int $patientId);
    public function paginate(bool $withAttended, int $perPage);
    public function paginateReceivedTransfers(int $perPage, bool $withAttended, int $doctorId);
    public function paginateReferredTransfers(int $perPage, bool $withAttended, int $doctorId);
    public function find($failIfNotExists = true, int $id): Transfer|null;
    public function create(TransferDTO $dto): Transfer;
    public function assignAppointment(int $appointmentId, int $transferId): bool;
    public function isAttended(int $id): bool;
    public function appointment(bool $failIfTransferNotExists, int $id): Appointment|null;

}
