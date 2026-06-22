<?php

namespace App\Services;

use App\DTOs\Appointment\AppointmentDTO;
use App\Enums\AppointmentStatusEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Repositories\DoctorRepository;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use App\Repositories\SchedulingRepository;
use Carbon\Carbon;

class VisitService extends Service
{
    public function __construct(
        protected AppointmentRepositoryInterface $appointmentRepository,
        protected SchedulingService $schedulingService,
        protected SchedulingRepository $schedulingRepository,
        protected DoctorRepository $doctorRepository,
    ) {
    }
    public function paginate(?AppointmentStatusEnum $status, bool $with_expired = false, int $per_page = 10): Response
    {
        $appointments = $this->appointmentRepository->paginate($status, $with_expired, $per_page);
        $items = $appointments->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "result" => "Success",
                "current_page_number" => $appointments->currentPage(),
                "last_page_number" => $appointments->lastPage(),
                "records_per_page" => $appointments->perPage(),
                "next_page_url" => $appointments->nextPageUrl(),
                "previous_page_url" => $appointments->previousPageUrl(),
                "first_page_url" => $appointments->url(1),
                "last_page_url" => $appointments->url($appointments->lastPage()),
                "total_records_number" => $appointments->total(),
            ],
            $items
        );
    }

    public function paginateDoctorAppointments(?AppointmentStatusEnum $status, bool $with_expired = false, int $per_page = 10, int $doctor_id): Response
    {
        $appointments = $this->appointmentRepository->paginateDoctorAppointments($status, $with_expired, $per_page, $doctor_id);
        $items = $appointments->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "result" => "Success",
                "current_page_number" => $appointments->currentPage(),
                "last_page_number" => $appointments->lastPage(),
                "records_per_page" => $appointments->perPage(),
                "next_page_url" => $appointments->nextPageUrl(),
                "previous_page_url" => $appointments->previousPageUrl(),
                "first_page_url" => $appointments->url(1),
                "last_page_url" => $appointments->url($appointments->lastPage()),
                "total_records_number" => $appointments->total(),
            ],
            $items
        );
    }
    public function paginatePatientAppointments(?AppointmentStatusEnum $status, bool $with_expired = false, int $per_page = 10, int $patient_id): Response
    {
        $appointments = $this->appointmentRepository->paginatePatientAppointments($status, $with_expired, $per_page, $patient_id);
        $items = $appointments->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "result" => "Success",
                "current_page_number" => $appointments->currentPage(),
                "last_page_number" => $appointments->lastPage(),
                "records_per_page" => $appointments->perPage(),
                "next_page_url" => $appointments->nextPageUrl(),
                "previous_page_url" => $appointments->previousPageUrl(),
                "first_page_url" => $appointments->url(1),
                "last_page_url" => $appointments->url($appointments->lastPage()),
                "total_records_number" => $appointments->total(),
            ],
            $items
        );
    }
    public function create(AppointmentDTO $appointmentDTO): Response
    {
        if (
            $this->appointmentRepository->exists(
                $appointmentDTO->doctor_id,
                $appointmentDTO->datetime,
                AppointmentStatusEnum::PENDING
            )
        ) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Sorry, This appointment time was already taken, please book at another time'),
                null,
                409
            );
        }

        $availableTimesResponse = $this->allAvailableTimesToBook($appointmentDTO->datetime, $appointmentDTO->doctor_id);
        if ($availableTimesResponse->result != ResponseStatusEnum::SUCCESS)
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Sorry, This appointment time isn\'t available to book'),
                null,
                409
            );
        $availableTimes = $availableTimesResponse->data;
        if (!in_array(Carbon::parse($appointmentDTO->datetime)->format('H:i'), $availableTimes))
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Sorry, This appointment time can\'t be booked, please select a time from available times to book with the doctor'),
                null,
                409
            );

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Appointment booked successfully'),
            $this->appointmentRepository->create($appointmentDTO),
            201
        );
    }
    public function find($failIfNotExists, bool $withPatient, bool $withDoctor, int $id): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->appointmentRepository->find($failIfNotExists, $withPatient, $withDoctor, $id)
        );
    }
    public function cancelAppointment(int $id): Response
    {
        $didCancelled = $this->appointmentRepository->updateAppointmentStatus(AppointmentStatusEnum::CANCELLED, $id);

        if (!$didCancelled)
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Failed to cancel the appointment, please try again'),
                null,
                500
            );

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Appointment cancelled successfully'),
        );
    }
    public function cancelAppointmentByDoctor(int $id): Response
    {
        $didCancelled = $this->appointmentRepository->updateAppointmentStatus(AppointmentStatusEnum::CANCELLED_BY_DOCTOR, $id);

        if (!$didCancelled)
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Failed to cancel the appointment, please try again'),
                null,
                500
            );

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Appointment cancelled successfully'),
        );
    }
    public function cancelAppointmentByMedicalCenter(int $id): Response
    {
        $didCancelled = $this->appointmentRepository->updateAppointmentStatus(AppointmentStatusEnum::CANCELLED_BY_MEDICAL_CENTER, $id);

        if (!$didCancelled)
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Failed to cancel the appointment, please try again'),
                null,
                500
            );

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Appointment cancelled successfully'),
        );
    }
    public function makeAppointmentMissed(int $id): Response
    {
        $didSucceed = $this->appointmentRepository->updateAppointmentStatus(AppointmentStatusEnum::MISSED, $id);

        if (!$didSucceed)
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Failed to make the appointment missed, please try again'),
                null,
                500
            );

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Appointment was made missed successfully'),
        );
    }
    public function makeAppointmentAttended(int $id): Response
    {
        $didSucceed = $this->appointmentRepository->updateAppointmentStatus(AppointmentStatusEnum::ATTENDED, $id);

        if (!$didSucceed)
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Failed to make the appointment attended, please try again'),
                null,
                500
            );

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Appointment attended successfully'),
        );
    }
    public function allAvailableTimesToBook(string $dateOfDay, int $doctorId): Response
    {
        $dateOfDay = Carbon::parse($dateOfDay)->format('Y-m-d');
        $dayWorkTimes = $this->schedulingRepository->allAvailableTimesToBook($dateOfDay, $doctorId, false);

        if ($dayWorkTimes->isEmpty())
            return new Response(
                ResponseStatusEnum::NOTHING,
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
                ResponseStatusEnum::NOTHING,
                Response::messageToArray('Sorry, doctor is not available on the specified day'),
            );

        $appointment_duration = $this->doctorRepository->getDoctorAppointmentDuration($doctorId);
        $dayTime = $dayWorkTime->start_time->copy();
        $availableTimes = [];

        while ($dayTime->copy()->addMinutes($appointment_duration)->lessThanOrEqualTo($dayWorkTime->end_time)) {
            $availableTimes[] = $dayTime->format('H:i');
            $dayTime = $dayTime->addMinutes($appointment_duration);
        }

        if (empty($availableTimes))
            return new Response(ResponseStatusEnum::SUCCESS, null, []);

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
            ResponseStatusEnum::SUCCESS,
            null,
            $availableTimes
        );
    }

}