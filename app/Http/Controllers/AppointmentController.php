<?php

namespace App\Http\Controllers;

use App\DTOs\Appointment\AppointmentDTO;
use App\Enums\AppointmentStatusEnum;
use App\Enums\UserRoleEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\Http\Requests\AppointmentController\AllAvailableTimesToBookRequest;
use App\Http\Requests\AppointmentController\StoreRequest;
use App\Http\Resources\Appointment\AppointmentToAdminResource;
use App\Http\Resources\Appointment\AppointmentToDoctorResource;
use App\Http\Resources\Appointment\AppointmentToPatientResource;
use App\Repositories\DoctorRepository;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use App\Services\AppointmentService;
use Illuminate\Support\Facades\Auth;

/**
 * @group Appointment APIs
 */
class AppointmentController extends Controller
{
    public function __construct(
        protected AppointmentService $appointmentService,
        protected AppointmentRepositoryInterface $appointmentRepository,
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
        switch (Auth::user()->role) {
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
        switch (Auth::user()->role) {
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
        (new DoctorRepository())->getDoctorById($doctor_id, true);
        $validatedDate = $request->validated();

        $response = $this->appointmentService->allAvailableTimesToBook($validatedDate['date_of_day'], $doctor_id);

        if ($response->result != ResponseStatusEnum::SUCCESS)
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);

        return response()->json([
            'result' => $response->result,
            'data' => $response->data,
        ], $response->statusCode);
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
        (new DoctorRepository())->getDoctorById($doctor_id, true);

        $validatedData = [];
        $validatedData['patient_id'] = Auth::user()->patient->id;
        $validatedData['doctor_id'] = $doctor_id;
        $validatedData['datetime'] = ($request->validated())['datetime'];

        $response = $this->appointmentService->create(AppointmentDTO::fromRequest($validatedData));

        if ($response->result != ResponseStatusEnum::SUCCESS)
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, false),
        ], $response->statusCode);
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

        if ($response->result != ResponseStatusEnum::SUCCESS)
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
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

        if ($response->result != ResponseStatusEnum::SUCCESS)
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
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

        if ($response->result != ResponseStatusEnum::SUCCESS)
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
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

        if ($response->result != ResponseStatusEnum::SUCCESS)
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, false),
        ], $response->statusCode);
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
        $response = $this->appointmentService->cancelAppointment($id);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
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

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);

    }

    // /**
    //  * Make an appointment missed
    //  * 
    //  * ###For: Mobile(Doctor)
    //  * Only doctors are allowed to use this API
    //  * @urlParam id integer required min:1 The ID number of appointment to be attended 
    //  */
    // public function makeAppointmentAttended(int $id)
    // {
    //     $response = $this->appointmentService->makeAppointmentAttended($id);

    //     if ($response->result != ResponseStatusEnum::SUCCESS)
    //         return response()->json([
    //             'result' => $response->result,
    //             'message' => $response->message,
    //         ], $response->statusCode);

    //     return response()->json([
    //         'result' => $response->result,
    //         'data' => $response->data,
    //     ], $response->statusCode);
    // }


}
