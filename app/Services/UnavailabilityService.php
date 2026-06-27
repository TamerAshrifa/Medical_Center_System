<?php

namespace App\Services;

use App\DTOs\Unavailability\UnavailabilityDTO;
use App\Enums\UnavailabilityTypeEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Mail\DoctorApologizeToPatientsMail;
use App\Mail\MedicalCenterApologizeToDoctorsMail;
use App\Mail\MedicalCenterApologizeToPatientsMail;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use App\Repositories\Interfaces\DoctorRepositoryInterface;
use App\Repositories\Interfaces\UnavailabilityRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use DB;

class UnavailabilityService extends Service
{
    public function __construct(
        protected UnavailabilityRepositoryInterface $unavailabilityRepository,
        protected DoctorRepositoryInterface $doctorRepository,
        protected AppointmentRepositoryInterface $appointmentRepository,
    ) {
    }

    public function paginateDoctorsUnavailabilities(bool $withPassed, int $perPage = 10): Response
    {
        $records = $this->unavailabilityRepository->paginateDoctorsUnavailabilities($withPassed, $perPage);
        $items = $records->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            $this->getPaginationMessage($records),
            $items
        );
    }
    public function paginateDoctorUnavailabilities(bool $withPassed = false, int $perPage = 10, $doctorId): Response
    {
        $records = $this->unavailabilityRepository->paginateDoctorUnavailabilities($withPassed, $perPage, $doctorId);
        $items = $records->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            $this->getPaginationMessage($records),
            $items
        );
    }
    public function paginateMedicalUnavailabilities(bool $withPassed = false, int $perPage = 10): Response
    {
        $records = $this->unavailabilityRepository->paginateMedicalUnavailabilities($withPassed, $perPage);

        $items = $records->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            $this->getPaginationMessage($records),
            $items
        );
    }
    private function sendEmailsByDoctor($emailsToApologizeToByDoctor, $unavailabilityStartDate, $unavailabilityEndDate, $makerId)
    {
        $doctorFullName = $this->doctorRepository->getDoctorFullname($makerId);
        foreach ($emailsToApologizeToByDoctor as $email)
            Mail::to($email)->send(new DoctorApologizeToPatientsMail(
                $unavailabilityStartDate,
                $unavailabilityEndDate,
                $doctorFullName
            ));
    }
    private function sendEmailsByMedicalCenter($emailsToApologizeTo, $unavailabilityStartDate, $unavailabilityEndDate)
    {
        foreach ($emailsToApologizeTo as $email)
            Mail::to($email)->send(new MedicalCenterApologizeToPatientsMail($unavailabilityStartDate, $unavailabilityEndDate));
        $doctorsEmailsToApologizeTo = $this->doctorRepository->allDoctorsEmails();
        foreach ($doctorsEmailsToApologizeTo as $email)
            Mail::to($email)->send(new MedicalCenterApologizeToDoctorsMail($unavailabilityStartDate, $unavailabilityEndDate));
    }
    public function createUnavailability(UnavailabilityDTO $unavailabilityDTO, int $makerId): Response
    {
        $unavailabilityStartDate = Carbon::parse($unavailabilityDTO->from_date)->format('Y-m-d');
        $unavailabilityEndDate = Carbon::parse($unavailabilityDTO->to_date)->format('Y-m-d');

        if ($unavailabilityDTO->type == UnavailabilityTypeEnum::DOCTOR) {
            if ($this->unavailabilityRepository->isThereConflictWithAnotherUnavailabilityForDoctor($unavailabilityStartDate, $unavailabilityEndDate, $makerId)) {
                return new Response(
                    ResponseStatusEnum::FAIL,
                    Response::messageToArray('Sorry, unavailability date range has conflicts with other exist unavailabilities, please make sure not to be conflicts and try again'),
                    null,
                    409
                );
            }
            $emailsToApologizeTo = $this->appointmentRepository->allDoctorPendingAppointmentsEmailsInDateRange($unavailabilityStartDate, $unavailabilityEndDate, $makerId);
        } else {
            if ($this->unavailabilityRepository->isThereConflictWithAnotherUnavailabilityForMedicalCenter($unavailabilityStartDate, $unavailabilityEndDate)) {
                return new Response(
                    ResponseStatusEnum::FAIL,
                    Response::messageToArray('Sorry, unavailability date range has conflicts with other exist unavailabilities, please make sure not to be conflicts and try again'),
                    null,
                    409
                );
            }
            $emailsToApologizeTo = $this->appointmentRepository->allPendingAppointmentsEmailsInDateRange($unavailabilityStartDate, $unavailabilityEndDate);
        }
        try {
            DB::transaction(function () use ($unavailabilityDTO, $makerId, $unavailabilityStartDate, $unavailabilityEndDate) {
                $unavailability = $this->unavailabilityRepository->createUnavailability($unavailabilityDTO);

                if ($unavailabilityDTO->type == UnavailabilityTypeEnum::DOCTOR) {
                    $this->unavailabilityRepository->createDoctorUnavailability($unavailability->id, $makerId);
                    $this->appointmentRepository->cancelByDoctorAllDoctorPendingAppointmentsEmailsInDateRange($unavailabilityStartDate, $unavailabilityEndDate, $makerId);
                } else {
                    $this->unavailabilityRepository->createMedicalCenterUnavailability($unavailability->id, $makerId);
                    $this->appointmentRepository->cancelByMedicalCenterAllPendingAppointmentsEmailsInDateRange($unavailabilityStartDate, $unavailabilityEndDate);
                }
            });
        } catch (\Exception $e) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray($e->getMessage()),
                null,
                500
            );
        }
        if ($unavailabilityDTO->type == UnavailabilityTypeEnum::DOCTOR)
            $this->sendEmailsByDoctor($emailsToApologizeTo, $unavailabilityStartDate, $unavailabilityEndDate, $makerId);
        else
            $this->sendEmailsByMedicalCenter($emailsToApologizeTo, $unavailabilityStartDate, $unavailabilityEndDate);

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Unavailability made successfully'),
            null,
            201
        );
    }

}