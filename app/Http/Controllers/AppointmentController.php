<?php

namespace App\Http\Controllers;

use App\DTOs\Appointment\AppointmentDTO;
use App\DTOs\Visit\VisitDTO;
use App\Enums\AppointmentStatusEnum;
use App\Enums\UserRoleEnum;
use App\Http\Requests\AppointmentController\AllAvailableTimesToBookRequest;
use App\Http\Requests\AppointmentController\MakeAppointmentAttendedRequest;
use App\Http\Requests\AppointmentController\StoreRequest;
use App\Http\Resources\Appointment\AppointmentToAdminResource;
use App\Http\Resources\Appointment\AppointmentToDoctorResource;
use App\Http\Resources\Appointment\AppointmentToPatientResource;
use App\Repositories\Interfaces\DoctorRepositoryInterface;
use App\Services\AppointmentService;
use Illuminate\Support\Facades\Auth;

/**
 * @group Appointment APIs
 */
class AppointmentController extends Controller
{
    public function __construct(
        protected AppointmentService $appointmentService,
        protected DoctorRepositoryInterface $doctorRepository,
    ) {
    }

    private function validateStutus(?string $status): AppointmentStatusEnum|null
    {
        if (!$status || $status == "")
            return null;
        $statuses = AppointmentStatusEnum::cases();
        foreach ($statuses as $st)
            if ($st->value == $status)
                return $st;
        return null;
    }
    private function selectIncludedEntities(?bool &$withPatient, ?bool &$withDoctor)
    {
        switch ($this->currentUserRole()) {
            case UserRoleEnum::ADMIN:
                $withPatient = $withDoctor = true;
                break;
            case UserRoleEnum::PATIENT:
                $withPatient = false;
                $withDoctor = true;
                break;
            case UserRoleEnum::DOCTOR:
                $withPatient = true;
                $withDoctor = false;
                break;
            default:
                $withPatient = $withDoctor = false;
                break;
        }
    }
    private function resource($appointmentOrCollectionOfIt, bool $isCollection)
    {
        switch ($this->currentUserRole()) {
            case UserRoleEnum::ADMIN:
                return $isCollection ?
                    AppointmentToAdminResource::collection($appointmentOrCollectionOfIt) :
                    new AppointmentToAdminResource($appointmentOrCollectionOfIt);
            case UserRoleEnum::DOCTOR:
                return $isCollection ?
                    AppointmentToDoctorResource::collection($appointmentOrCollectionOfIt) :
                    new AppointmentToDoctorResource($appointmentOrCollectionOfIt);
            case UserRoleEnum::PATIENT:
                return $isCollection ?
                    AppointmentToPatientResource::collection($appointmentOrCollectionOfIt) :
                    new AppointmentToPatientResource($appointmentOrCollectionOfIt);
            default:
                return $isCollection ?
                    AppointmentToPatientResource::collection($appointmentOrCollectionOfIt) :
                    new AppointmentToPatientResource($appointmentOrCollectionOfIt);
        }
    }

    /**
     * View Available Times to book
     * 
     * ###For: Mobile(Patient)
     * Only patients are allowed to use this API.
     * View all available times to book with a specific doctor
     * @urlParam doctor_id integer required min:1
     */
    public function allAvailableTimesToBook(AllAvailableTimesToBookRequest $request, int $doctor_id)
    {
        $this->doctorRepository->find($doctor_id, true);
        $validatedDate = $request->validated();

        $response = $this->appointmentService->allAvailableTimesToBook($validatedDate['date_of_day'], $doctor_id);
        return $this->jsonResponse($response);

    }

    /**
     * Make Appointment
     * 
     * ###For: Mobile(Patient)
     * Only patients are allowed to use this API.
     * Firstly, the patient select a time to book in from "View Available Times" API, then he assigns it to this API with
     * the date of day he wanna book in
     * @urlParam doctor_id integer required min:1
     */
    public function store(StoreRequest $request, int $doctor_id)
    {
        $this->doctorRepository->find($doctor_id, true);

        $validatedData = array_merge($request->validated(), [
            'patient_id' => Auth::user()->patient->id,
            'doctor_id' => $doctor_id,
        ]);

        $response = $this->appointmentService->create(AppointmentDTO::fromRequest($validatedData));
        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }


    /**
     * View all appointments in the system
     * 
     * ###For: Web
     * Only admins are allowed to use this API
     * @urlParam status string required Status should be null or one of [pending - cancelled - cancelled_by_doctor - cancelled_by_medical_center - missed - attended]
     * @urlParam with_expired integer required Boolean value means does the admin want all of appointments to be showen even with expired ones or only non-expired appointments?
     * @urlParam per_page integer required min:1 The number of items be shown in each page. Defaults to 10. 
     */
    public function paginate(string $status = null, bool $with_expired = false, int $per_page = 10)
    {
        $status = $this->validateStutus($status);

        $response = $this->appointmentService->paginate($status, $with_expired, $per_page);
        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View all appointments of a specified doctor
     * 
     * ###For: Web, Mobile(Doctor)
     * Only admins and doctors are allowed to use this API
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam status string required Status should be null or one of [pending - cancelled - cancelled_by_doctor - cancelled_by_medical_center - missed - attended]
     * @urlParam with_expired integer required Boolean value means does the admin want all of appointments to be showen even with expired ones or only non-expired appointments?
     * @urlParam per_page integer required min:1 The number of items be shown in each page. Defaults to 10. 
     * @urlParam doctor_id integer required min:1 The ID number of doctor to view it's appointments 
     */
    public function paginateDoctorAppointments(string $status = null, bool $with_expired = false, int $per_page = 10, int $doctor_id)
    {
        $status = $this->validateStutus($status);

        $response = $this->appointmentService->paginateDoctorAppointments($status, $with_expired, $per_page, $doctor_id);
        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View all appointments of a specified patoent
     * 
     * ###For: Web, Mobile(Patient)
     * Only admins and patoents are allowed to use this API
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam status string required Status should be null or one of [pending - cancelled - cancelled_by_doctor - cancelled_by_medical_center - missed - attended]
     * @urlParam with_expired integer required Boolean value means does the admin want all of appointments to be showen even with expired ones or only non-expired appointments?
     * @urlParam per_page integer required min:1 The number of items be shown in each page. Defaults to 10. 
     * @urlParam patient_id integer required min:1 The ID number of patient to view it's appointments 
     */
    public function paginatePatientAppointments(string $status = null, bool $with_expired = false, int $per_page = 10, int $patient_id)
    {
        $status = $this->validateStutus($status);

        $response = $this->appointmentService->paginatePatientAppointments($status, $with_expired, $per_page, $patient_id);
        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View a specified appointment
     * 
     * ###For: Web, Mobile(Patient, Doctor)
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * Everyone in the system is allowed to use this API
     * @urlParam id integer required min:1 The ID number of appointment to be showen 
     */
    public function show(int $id)
    {
        $this->selectIncludedEntities($withPatient, $withDoctor);

        $response = $this->appointmentService->find(true, $withPatient, $withDoctor, $id);
        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }



    /**
     * Cancel an appointment
     * 
     * ###For: Mobile(Patient)
     * Only patients are allowed to use this API
     * @urlParam id integer required min:1 The ID number of appointment to be cancelled 
     */
    public function cancelAppointment(int $id)
    {
        $response = $this->appointmentService->cancel($id);
        return $this->jsonResponse($response);
    }

    /**
     * Make an appointment missed
     * 
     * ###For: Mobile(Doctor)
     * Only doctors are allowed to use this API
     * @urlParam id integer required min:1 The ID number of appointment to be missed 
     */
    public function makeAppointmentMissed(int $id)
    {
        $response = $this->appointmentService->makeAppointmentMissed($id);

        return $this->jsonResponse($response);
    }

    /**
     * Make an appointment attended
     * 
     * ###For: Mobile(Doctor)
     * Only doctors are allowed to use this API
     * @urlParam id integer required min:1 The ID number of appointment to be attended 
     */
    public function makeAppointmentAttended(MakeAppointmentAttendedRequest $request, int $id)
    {
        $validatedData = array_merge($request->validated(), [
            'appointment_id' => $id,
        ]);

        $visitDTO = VisitDTO::fromRequest($validatedData);

        $response = $this->appointmentService->makeAppointmentAttended($visitDTO);

        return $this->jsonResponse($response);
    }


}
