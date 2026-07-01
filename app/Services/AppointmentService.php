<?php

namespace App\Services;

use App\DTOs\Appointment\AppointmentDTO;
use App\DTOs\MedicalRecordAccess\MedicalRecordAccessDTO;
use App\DTOs\Visit\VisitDTO;
use App\Enums\AppointmentStatusEnum;
use App\GeneralClasses\Response;
use App\Models\Appointment;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use App\Repositories\Interfaces\UnavailabilityRepositoryInterface;
use App\Repositories\SchedulingRepository;
use App\Repositories\VisitRepository;
use Carbon\Carbon;
use DB;

class AppointmentService extends Service
{
    public function __construct(
        protected AppointmentRepositoryInterface $appointmentRepository,
        protected MedicalRecordAccessService $medicalRecordAccessService,
        protected SchedulingRepository $schedulingRepository,
        protected VisitRepository $visitRepository,
        protected UnavailabilityRepositoryInterface $unavailabilityRepository,
    ) {
    }
    public function paginate(?AppointmentStatusEnum $status, bool $withExpired = false, int $perPage = 10): Response
    {
        $records = $this->appointmentRepository->paginate($status, $withExpired, $perPage);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function paginateDoctorAppointments(?AppointmentStatusEnum $status, bool $withExpired = false, int $perPage = 10, int $doctorId): Response
    {
        $records = $this->appointmentRepository->paginateDoctorAppointments($status, $withExpired, $perPage, $doctorId);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function paginatePatientAppointments(?AppointmentStatusEnum $status, bool $withExpired = false, int $perPage = 10, int $patientId): Response
    {
        $records = $this->appointmentRepository->paginatePatientAppointments($status, $withExpired, $perPage, $patientId);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function create(AppointmentDTO $dto): Response
    {
        if (
            $this->appointmentRepository->exists(
                $dto->doctor_id,
                $dto->datetime,
                AppointmentStatusEnum::PENDING
            )
        ) {
            return new Response(
                false,
                Response::messageToArray('Sorry, This appointment time was already taken, please book at another time'),
                null,
                409
            );
        }
        if ($this->unavailabilityRepository->isMedicalCenterUnavailability(Carbon::parse($dto->datetime)->format('Y-m-d'))) {
            return new Response(
                false,
                Response::messageToArray('Sorry, The medical center has a vacation time on this date, please book at available time'),
                null,
                409
            );
        }
        if (
            $this->unavailabilityRepository->isDoctorUnavailability(
                Carbon::parse($dto->datetime)->format('Y-m-d'),
                $dto->doctor_id
            )
        ) {
            return new Response(
                false,
                Response::messageToArray('Sorry, The doctor has a vacation time on this date, please book at available time'),
                null,
                409
            );
        }


        $availableTimesResponse = $this->allAvailableTimesToBook($dto->datetime, $dto->doctor_id);
        if (!$availableTimesResponse->did_succeed)
            return new Response(
                false,
                Response::messageToArray('Sorry, This appointment time isn\'t available to book'),
                null,
                409
            );
        $availableTimes = $availableTimesResponse->data;
        if (!in_array(Carbon::parse($dto->datetime)->format('H:i'), $availableTimes))
            return new Response(
                false,
                Response::messageToArray('Sorry, This appointment time can\'t be booked, please select a time from available times to book with the doctor'),
                null,
                409
            );

        return new Response(
            true,
            Response::messageToArray('Appointment booked successfully'),
            $this->appointmentRepository->create($dto),
            201
        );
    }
    public function find($failIfNotExists, bool $withPatient, bool $withDoctor, int $id): Response
    {
        return new Response(
            true,
            null,
            $this->appointmentRepository->find($failIfNotExists, $withPatient, $withDoctor, $id)
        );
    }
    public function cancel(int $id): Response
    {
        $didCancelled = $this->appointmentRepository->updateAppointmentStatus(AppointmentStatusEnum::CANCELLED, $id);

        if (!$didCancelled)
            return new Response(
                false,
                Response::messageToArray('Failed to cancel the appointment, please try again'),
                null,
                500
            );

        return new Response(
            true,
            Response::messageToArray('Appointment cancelled successfully'),
        );
    }
    public function makeAppointmentMissed(int $id): Response
    {
        $didSucceed = $this->appointmentRepository->updateAppointmentStatus(AppointmentStatusEnum::MISSED, $id);

        if (!$didSucceed)
            return new Response(
                false,
                Response::messageToArray('Failed to make the appointment missed, please try again'),
                null,
                500
            );

        return new Response(
            true,
            Response::messageToArray('Appointment was made missed successfully'),
        );
    }
    public function makeAppointmentAttended(VisitDTO $dto): Response
    {
        if ($this->appointmentRepository->isAttended($dto->appointment_id)) {
            return new Response(
                true,
                Response::messageToArray('This appointment was already made attended'),
            );
        }

        try {
            DB::transaction(function () use ($dto) {
                $this->appointmentRepository->updateAppointmentStatus(AppointmentStatusEnum::ATTENDED, $dto->appointment_id);

                $createdVisitId = $this->visitRepository->create($dto)->id;

                $appointment = Appointment::findOrFail($dto->appointment_id, ['patient_id', 'doctor_id']);

                $this->medicalRecordAccessService->create(MedicalRecordAccessDTO::fromRequest([
                    'visit_id' => $createdVisitId,
                    'patient_id' => $appointment->patient_id,
                    'can_accessed_by_doctor_id' => $appointment->doctor_id,
                ]));
            });
        } catch (\Throwable $e) {
            return new Response(
                false,
                Response::messageToArray($e->getMessage()),
                null,
                500
            );
        }

        return new Response(
            true,
            Response::messageToArray('Appointment attended successfully, a visit was made'),
        );
    }
    public function allAvailableTimesToBook(string $dateOfDay, int $doctorId): Response
    {
        $dateOfDay = Carbon::parse($dateOfDay)->format('Y-m-d');
        $dayWorkTimes = $this->schedulingRepository->allAvailableTimesToBook($dateOfDay, $doctorId, false);

        if ($dayWorkTimes->isEmpty())
            return new Response(
                false,
                Response::messageToArray('Sorry, doctor is not available on the specified day'),
            );

        $dayWorkTime = null;
        $idOfDay = $this->schedulingRepository->getWeekDayId($dateOfDay);
        foreach ($dayWorkTimes as $day)
            if ($day->weekday_id == $idOfDay) {
                $dayWorkTime = $day;
                break;
            }

        if (!$dayWorkTime)
            return new Response(
                false,
                Response::messageToArray('Sorry, doctor is not available on the specified day'),
            );

        $appointment_duration = $this->appointmentRepository->doctorAppointmentDuration($doctorId);
        $dayTime = $dayWorkTime->start_time->copy();
        $availableTimes = [];

        while ($dayTime->copy()->addMinutes($appointment_duration)->lessThanOrEqualTo($dayWorkTime->end_time)) {
            $availableTimes[] = $dayTime->format('H:i');
            $dayTime = $dayTime->addMinutes($appointment_duration);
        }

        if (empty($availableTimes))
            return new Response(true, null, []);

        $appointments = $this->appointmentRepository->getBookedAppointmentsOfDoctorInDate($dateOfDay, $doctorId);

        foreach ($appointments as $app) {
            $valueToRemoveIfExists = $app->datetime->format('H:i');
            if (in_array($valueToRemoveIfExists, $availableTimes, true))
                $availableTimes = array_values(array_filter(
                    $availableTimes,
                    fn($item) => $item !== $valueToRemoveIfExists
                ));
        }
        return new Response(
            true,
            null,
            $availableTimes
        );
    }

}