<?php

namespace App\Repositories;

use App\DTOs\Transfer\TransferDTO;
use App\Enums\AppointmentStatusEnum;
use App\Models\Appointment;
use App\Models\Transfer;
use App\Repositories\Interfaces\TransferRepositoryInterface;

class TransferRepository extends Repository implements TransferRepositoryInterface
{

    public function allPatientTransfers(bool $withAttended, int $patientId)
    {
        return Transfer::
            where('patient_id', $patientId)
            ->when(!$withAttended, function ($q) {
                $q->where(function ($q) {
                    $q->whereDoesntHave('appointment')
                        ->orWhereHas(
                            'appointment',
                            fn($q2) => $q2->whereNot('status', AppointmentStatusEnum::ATTENDED->value)
                        );
                });
            })
            ->orderByDesc('created_at')
            ->get();
    }

    public function paginate(bool $withAttended, int $perPage)
    {
        return Transfer::
            when(!$withAttended, function ($q) {
                $q->where(function ($q) {
                    $q->whereDoesntHave('appointment')
                        ->orWhereHas(
                            'appointment',
                            fn($q2) => $q2->whereNot('status', AppointmentStatusEnum::ATTENDED->value)
                        );
                });
            })
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }
    public function paginateReceivedTransfers(int $perPage, bool $withAttended, int $doctorId)
    {
        return Transfer::
            where('receiving_doctor_id', $doctorId)
            ->when(!$withAttended, function ($q) {
                $q->where(function ($q) {
                    $q->whereDoesntHave('appointment')
                        ->orWhereHas(
                            'appointment',
                            fn($q2) => $q2->whereNot('status', AppointmentStatusEnum::ATTENDED->value)
                        );
                });
            })
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }
    public function paginateReferredTransfers(int $perPage, bool $withAttended, int $doctorId)
    {
        return Transfer::
            where('referring_doctor_id', $doctorId)
            ->when(!$withAttended, function ($q) {
                $q->where(function ($q) {
                    $q->whereDoesntHave('appointment')
                        ->orWhereHas(
                            'appointment',
                            fn($q2) => $q2->whereNot('status', AppointmentStatusEnum::ATTENDED->value)
                        );
                });
            })
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }

    public function find($failIfNotExists = true, int $id): Transfer|null
    {
        return $failIfNotExists ? Transfer::findOrFail($id) : Transfer::find($id);
    }

    public function create(TransferDTO $dto): Transfer
    {
        return Transfer::create($dto->toArray());
    }

    public function assignAppointment(int $appointmentId, int $transferId): bool
    {
        return Transfer::findOrFail($transferId)->update([
            'appointment_id' => $appointmentId,
        ]);
    }

    public function isAttended(int $id): bool
    {
        return Transfer::
            where('id', $id)
            ->whereHas('appointment', fn($q) => $q->where('status', AppointmentStatusEnum::ATTENDED->value))
            ->exists();
    }
    public function appointment(bool $failIfTransferNotExists, int $id): Appointment|null
    {
        if ($failIfTransferNotExists)
            return Transfer::findOrFail($id)->appointment;

        $trans = Transfer::find($id);
        return $trans ? $trans->appointment : null;
    }

}
