<?php

namespace App\Services;

use App\DTOs\Unavailability\UnavailabilityDTO;
use App\Enums\UnavailabilityTypeEnum;

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
        parent::__construct();
    }

    public function paginateDoctorsUnavailabilities(bool $withPassed): Response
    {
        $records = $this->unavailabilityRepository->paginateDoctorsUnavailabilities($withPassed, $this->perPage);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function paginateDoctorUnavailabilities(bool $withPassed = false, $doctorId): Response
    {
        $records = $this->unavailabilityRepository->paginateDoctorUnavailabilities($withPassed, $this->perPage, $doctorId);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function paginateMedicalUnavailabilities(bool $withPassed = false): Response
    {
        $records = $this->unavailabilityRepository->paginateMedicalUnavailabilities($withPassed, $this->perPage);

        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    private function sendEmailsByDoctor($emailsToApologizeToByDoctor, $unavailabilityStartDate, $unavailabilityEndDate, $makerId)
    {
        $doctorFullName = $this->doctorRepository->fullname($makerId);
        foreach ($emailsToApologizeToByDoctor as $email)
            Mail::to($email)->queue(new DoctorApologizeToPatientsMail(
                $unavailabilityStartDate,
                $unavailabilityEndDate,
                $doctorFullName
            ));
    }
    private function sendEmailsByMedicalCenter($emailsToApologizeTo, $unavailabilityStartDate, $unavailabilityEndDate)
    {
        foreach ($emailsToApologizeTo as $email)
            Mail::to($email)->queue(new MedicalCenterApologizeToPatientsMail($unavailabilityStartDate, $unavailabilityEndDate));
        $doctorsEmailsToApologizeTo = $this->doctorRepository->allDoctorsEmails();
        foreach ($doctorsEmailsToApologizeTo as $email)
            Mail::to($email)->queue(new MedicalCenterApologizeToDoctorsMail($unavailabilityStartDate, $unavailabilityEndDate));
    }
    public function create(UnavailabilityDTO $dto, int $makerId): Response
    {
        $unavailabilityStartDate = Carbon::parse($dto->from_date)->format('Y-m-d');
        $unavailabilityEndDate = Carbon::parse($dto->to_date)->format('Y-m-d');

        if ($dto->type == UnavailabilityTypeEnum::DOCTOR) {
            if ($this->unavailabilityRepository->isThereConflictWithAnotherUnavailabilityForDoctor($unavailabilityStartDate, $unavailabilityEndDate, $makerId)) {
                return new Response(
                    false,
                    Response::messageToArray('Sorry, unavailability date range has conflicts with other exist unavailabilities, please make sure not to be conflicts and try again'),
                    null,
                    409
                );
            }
            $emailsToApologizeTo = $this->appointmentRepository->allDoctorPendingAppointmentsEmailsInDateRange($unavailabilityStartDate, $unavailabilityEndDate, $makerId);
        } else {
            if ($this->unavailabilityRepository->isThereConflictWithAnotherUnavailabilityForMedicalCenter($unavailabilityStartDate, $unavailabilityEndDate)) {
                return new Response(
                    false,
                    Response::messageToArray('Sorry, unavailability date range has conflicts with other exist unavailabilities, please make sure not to be conflicts and try again'),
                    null,
                    409
                );
            }
            $emailsToApologizeTo = $this->appointmentRepository->allPendingAppointmentsEmailsInDateRange($unavailabilityStartDate, $unavailabilityEndDate);
        }

        DB::transaction(function () use ($dto, $makerId, $unavailabilityStartDate, $unavailabilityEndDate) {
            $unavailability = $this->unavailabilityRepository->createUnavailability($dto);

            if ($dto->type == UnavailabilityTypeEnum::DOCTOR) {
                $this->unavailabilityRepository->createDoctorUnavailability($unavailability->id, $makerId);
                $this->appointmentRepository->cancelByDoctorAllDoctorPendingAppointmentsEmailsInDateRange($unavailabilityStartDate, $unavailabilityEndDate, $makerId);
            } else {
                $this->unavailabilityRepository->createMedicalCenterUnavailability($unavailability->id, $makerId);
                $this->appointmentRepository->cancelByMedicalCenterAllPendingAppointmentsEmailsInDateRange($unavailabilityStartDate, $unavailabilityEndDate);
            }
        });

        if ($dto->type == UnavailabilityTypeEnum::DOCTOR)
            $this->sendEmailsByDoctor($emailsToApologizeTo, $unavailabilityStartDate, $unavailabilityEndDate, $makerId);
        else
            $this->sendEmailsByMedicalCenter($emailsToApologizeTo, $unavailabilityStartDate, $unavailabilityEndDate);

        return new Response(
            true,
            Response::messageToArray('Unavailability made successfully'),
            null,
            201
        );
    }

}