<?php

namespace App\Http\Controllers;

use App\DTOs\Appointment\AppointmentDTO;
use App\DTOs\Transfer\TransferDTO;
use App\Enums\UserRoleEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\Http\Requests\TransferController\StoreRequest;
use App\Http\Resources\Transfer\TransferToAdminResource;
use App\Http\Resources\Transfer\TransferToDoctorResource;
use App\Http\Resources\Transfer\TransferToPatientResource;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Transfer;
use App\Services\TransferService;
use Illuminate\Support\Facades\Auth;

/**
 * @group Transfer APIs
 */
class TransferController extends Controller
{
    public function __construct(
        protected TransferService $transferService,
    ) {
    }

    private function resource($recordOrCollectionOfIt, bool $isCollection)
    {
        switch (Auth::user()->role) {
            case UserRoleEnum::ADMIN:
                return $isCollection ?
                    TransferToAdminResource::collection($recordOrCollectionOfIt) :
                    new TransferToAdminResource($recordOrCollectionOfIt);
            case UserRoleEnum::DOCTOR:
                return $isCollection ?
                    TransferToDoctorResource::collection($recordOrCollectionOfIt) :
                    new TransferToDoctorResource($recordOrCollectionOfIt);
            case UserRoleEnum::PATIENT:
                return $isCollection ?
                    TransferToPatientResource::collection($recordOrCollectionOfIt) :
                    new TransferToPatientResource($recordOrCollectionOfIt);
            default:
                return $isCollection ?
                    TransferToPatientResource::collection($recordOrCollectionOfIt) :
                    new TransferToPatientResource($recordOrCollectionOfIt);
        }
    }

    /**
     * Transfer a patient to another doctor
     * 
     * ###For: Mobile(Doctor)
     * Only doctors are allowed to use this API
     * @urlParam patient_id integer required
     * @urlParam receiving_doctor_id integer required
     */
    public function store(StoreRequest $request, int $patient_id, int $receiving_doctor_id)
    {
        Patient::findOrFail($patient_id, 'id');
        Doctor::findOrFail($receiving_doctor_id, 'id');

        $validatedData = $request->validated();
        $validatedData = array_merge($validatedData, [
            'referring_doctor_id' => Auth::user()->doctor->id,
            'receiving_doctor_id' => $receiving_doctor_id,
            'patient_id' => $patient_id,
        ]);

        $response = $this->transferService->create(TransferDTO::fromRequest($validatedData));
        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }

    /**
     * Paginate transfers in the system
     * 
     * ###For: Web
     * Only admins are allowed to use this API
     * @urlParam per_page integer required min:1 The number of items be shown in each page. Defaults to 10. 
     * @urlParam with_attended integer required Boolean value means does the admin want all of transfers to be showen even with attended ones?
     */
    public function paginate(int $per_page = 10, bool $with_attended)
    {
        $response = $this->transferService->paginate($per_page, $with_attended);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
    }

    /**
     * View all transfers of a specified patient
     * 
     * ###For: Web, Mobile(Patient)
     * Only admins and patients are allowed to use this API
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam with_attended integer required Boolean value means does the admin want all of transfers to be showen even with attended ones?
     * @urlParam patient_id integer required min:1 The ID number of patient to view all permissions given by him 
     */
    public function allPatientTransfers(bool $with_attended, int $patient_id)
    {
        $response = $this->transferService->allPatientTransfers($with_attended, $patient_id);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
    }

    /**
     * Paginate transfers sent by a specified doctor
     * 
     * ###For: Web, Mobile(Doctor)
     * Only admins and doctors are allowed to use this API
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam per_page integer required min:1 The number of items be shown in each page. Defaults to 10. 
     * @urlParam with_attended integer required Boolean value means does the admin want all of transfers to be showen even with attended ones?
     * @urlParam doctor_id integer required
     */
    public function paginateReferredTransfers(int $per_page = 10, bool $with_attended, int $doctor_id)
    {
        $response = $this->transferService->paginateReferredTransfers($per_page, $with_attended, $doctor_id);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
    }

    /**
     * Paginate received transfers of a specified doctor
     * 
     * ###For: Web, Mobile(Doctor)
     * Only admins and doctors are allowed to use this API
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam per_page integer required min:1 The number of items be shown in each page. Defaults to 10. 
     * @urlParam with_attended integer required Boolean value means does the admin want all of transfers to be showen even with attended ones?
     * @urlParam doctor_id integer required
     */
    public function paginateReceivedTransfers(int $per_page = 10, bool $with_attended, int $doctor_id)
    {
        $response = $this->transferService->paginateReceivedTransfers($per_page, $with_attended, $doctor_id);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
    }

    /**
     * Show a specified transfer
     *
     * ###For: Web, Mobile(Patient, Doctor)
     * Everyone in the system is allowed to use this API
     * @urlParam id integer required The ID number of transfer to be showen
     */
    public function show(int $id)
    {
        $response = $this->transferService->find($id);
        return response()->json([
            'result' => $response->result,
            'data' => $this->resource($response->data, false),
        ], $response->statusCode);
    }

    /**
     * Make an appointment for a specified transfer
     *
     * ###For: Mobile(Patient)
     * Only patients are allowed to use this API
     * Everyone in the system is allowed to use this API
     * @urlParam transfer_id integer required The ID number of transfer to make an appointment for
     */
    public function makeAppointmentForTransfer(\App\Http\Requests\AppointmentController\StoreRequest $request, int $transfer_id)
    {
        $transferReceivingDoctorId = Transfer::where('id', $transfer_id)->valueOrFail('receiving_doctor_id');
        $validatedData = array_merge($request->validated(), [
            'patient_id' => Auth::user()->patient->id,
            'doctor_id' => $transferReceivingDoctorId,
        ]);

        $response = $this->transferService->makeAppointmentForTransfer(AppointmentDTO::fromRequest($validatedData), false, $transfer_id);

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }

    /**
     * Make another appointment instead of previous-one for a specified transfer
     *
     * ###For: Mobile(Patient)
     * Only patients are allowed to use this API
     * Everyone in the system is allowed to use this API
     * @urlParam transfer_id integer required The ID number of transfer to make an appointment for
     */
    public function makeAnotherAppointmentForTransfer(\App\Http\Requests\AppointmentController\StoreRequest $request, int $transfer_id)
    {
        $transferReceivingDoctorId = Transfer::where('id', $transfer_id)->valueOrFail('receiving_doctor_id');
        $validatedData = array_merge($request->validated(), [
            'patient_id' => Auth::user()->patient->id,
            'doctor_id' => $transferReceivingDoctorId,
        ]);

        $response = $this->transferService->makeAnotherAppointmentForTransfer(AppointmentDTO::fromRequest($validatedData), $transfer_id);

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }

}