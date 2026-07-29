<?php

namespace App\Services;

use App\DTOs\Appointment\AppointmentDTO;
use App\DTOs\Transfer\TransferDTO;
use App\GeneralClasses\Response;
use App\Mail\TransferToDoctorAppointmentChangedMail;
use App\Mail\TransferToDoctorMail;
use App\Mail\TransferToPatientMail;
use App\Models\Doctor;
use App\Models\Patient;
use App\Repositories\Interfaces\TransferRepositoryInterface;
use Illuminate\Support\Facades\Mail;
use DB;

class TransferService extends Service
{
    public function __construct(
        protected TransferRepositoryInterface $transferRepository,
        protected AppointmentService $appointmentService,
    ) {
        parent::__construct();
    }
    public function paginateReferredTransfers(bool $withAttended, int $doctorId): Response
    {
        $records = $this->transferRepository->paginateReferredTransfers($this->perPage, $withAttended, $doctorId);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function paginateReceivedTransfers(bool $withAttended, int $doctorId): Response
    {
        $records = $this->transferRepository->paginateReceivedTransfers($this->perPage, $withAttended, $doctorId);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function paginate(bool $withAttended): Response
    {
        $records = $this->transferRepository->paginate($withAttended, $this->perPage);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function allPatientTransfers(bool $withAttended, int $patientId): Response
    {
        return new Response(
            true,
            null,
            $this->transferRepository->allPatientTransfers($withAttended, $patientId),
        );
    }
    public function find(int $id): Response
    {
        return new Response(
            true,
            null,
            $this->transferRepository->find(true, $id),
        );
    }
    public function create(TransferDTO $dto): Response
    {
        $this->transferRepository->create($dto);
        Mail::to(Patient::findOrFail($dto->patient_id)->user->email)->send(new TransferToPatientMail());

        return new Response(
            true,
            Response::messageToArray('Patient was transfered to another doctor successfully'),
        );
    }
    public function makeAppointmentForTransfer(AppointmentDTO $dto, bool $changeAppointment, int $transferId): Response
    {
        return DB::transaction(function () use ($dto, $transferId, $changeAppointment) {
            $res = $this->appointmentService->create($dto);

            if ($res->did_succeed != true)
                return $res;

            $createdAppointmentId = $res->data->id;

            $this->transferRepository->assignAppointment($createdAppointmentId, $transferId);

            Mail::to(Doctor::findOrFail($dto->doctor_id)->user->email)
                ->send($changeAppointment ? new TransferToDoctorAppointmentChangedMail() : new TransferToDoctorMail());

            return new Response(
                true,
                Response::messageToArray('Appointment was created and assigned to the transfer successfully'),
            );
        });
    }
    public function makeAnotherAppointmentForTransfer(AppointmentDTO $dto, int $transferId): Response
    {
        if ($this->transferRepository->isAttended($transferId)) {
            return new Response(
                false,
                Response::messageToArray('Transfer appointment was already attended, it can\'t be changed'),
                null,
                409
            );
        }
        $appointmentOfVisit = $this->transferRepository->appointment(false, $transferId);
        if ($appointmentOfVisit) {
            $res = $this->appointmentService->cancel($appointmentOfVisit->id);
            if ($res->did_succeed != true)
                return $res;
        }

        $res = $this->makeAppointmentForTransfer($dto, true, $transferId);
        if ($res->did_succeed != true)
            return $res;

        return new Response(
            true,
            Response::messageToArray('Appointment of the transfer was changed successfully'),
        );
    }
}
