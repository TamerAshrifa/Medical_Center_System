<?php

namespace App\Services;

use App\DTOs\Appointment\AppointmentDTO;
use App\DTOs\Transfer\TransferDTO;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Mail\TransferToDoctorAppointmentChangedMail;
use App\Mail\TransferToDoctorMail;
use App\Mail\TransferToPatientMail;
use App\Models\Doctor;
use App\Models\Patient;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use App\Repositories\Interfaces\DoctorRepositoryInterface;
use App\Repositories\Interfaces\TransferRepositoryInterface;
use Illuminate\Support\Facades\Mail;
use DB;

class TransferService extends Service
{
    public function __construct(
        protected TransferRepositoryInterface $transferRepository,
        protected AppointmentRepositoryInterface $appointmentRepository,
        protected DoctorRepositoryInterface $doctorRepository,
        protected AppointmentService $appointmentService,
    ) {
    }
    public function paginateReferredTransfers(int $perPage = 10, bool $withAttended, int $doctorId): Response
    {
        $records = $this->transferRepository->paginateReferredTransfers($perPage, $withAttended, $doctorId);
        $items = $records->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            $this->getPaginationMessage($records),
            $items
        );
    }
    public function paginateReceivedTransfers(int $perPage = 10, bool $withAttended, int $doctorId): Response
    {
        $records = $this->transferRepository->paginateReceivedTransfers($perPage, $withAttended, $doctorId);
        $items = $records->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            $this->getPaginationMessage($records),
            $items
        );
    }
    public function paginate(int $perPage = 10, bool $withAttended): Response
    {
        $records = $this->transferRepository->paginate($withAttended, $perPage);
        $items = $records->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            $this->getPaginationMessage($records),
            $items
        );
    }
    public function allPatientTransfers(bool $withAttended, int $patientId): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->transferRepository->allPatientTransfers($withAttended, $patientId),
        );
    }
    public function find(int $id): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->transferRepository->find(true, $id),
        );
    }
    public function create(TransferDTO $dto): Response
    {
        $this->transferRepository->create($dto);
        Mail::to(Patient::findOrFail($dto->patient_id)->user->email)->send(new TransferToPatientMail());

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Patient was transfered to another doctor successfully'),
        );
    }
    public function makeAppointmentForTransfer(AppointmentDTO $appointmentDTO, bool $changeAppointment, int $transferId): Response
    {
        return DB::transaction(function () use ($appointmentDTO, $transferId, $changeAppointment) {
            $res = $this->appointmentService->create($appointmentDTO);

            if ($res->result != ResponseStatusEnum::SUCCESS)
                return $res;

            $createdAppointmentId = $res->data->id;

            $this->transferRepository->assignAppointment($createdAppointmentId, $transferId);

            Mail::to(Doctor::findOrFail($appointmentDTO->doctor_id)->user->email)
                ->send($changeAppointment ? new TransferToDoctorAppointmentChangedMail() : new TransferToDoctorMail());

            return new Response(
                ResponseStatusEnum::SUCCESS,
                Response::messageToArray('Appointment was created and assigned to the transfer successfully'),
            );
        });
    }
    public function makeAnotherAppointmentForTransfer(AppointmentDTO $appointmentDTO, int $transferId): Response
    {
        if ($this->transferRepository->isAttended($transferId)) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Transfer appointment was already attended, it can\'t be changed'),
                null,
                409
            );
        }
        $appointmentOfVisit = $this->transferRepository->appointment(false, $transferId);
        if ($appointmentOfVisit) {
            $res = $this->appointmentService->cancelAppointment($appointmentOfVisit->id);
            if ($res->result != ResponseStatusEnum::SUCCESS)
                return $res;
        }

        $res = $this->makeAppointmentForTransfer($appointmentDTO, true, $transferId);
        if ($res->result != ResponseStatusEnum::SUCCESS)
            return $res;

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Appointment of the transfer was changed successfully'),
        );
    }
}
