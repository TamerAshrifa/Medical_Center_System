<?php

namespace App\Http\Controllers;

use App\DTOs\Patient\PatientDTO;
use App\DTOs\Patient\PatientDTOUpdate;
use App\Enums\UserRoleEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\Http\Requests\PatientController\StorePatientRequest;
use App\Http\Requests\PatientController\UpdatePatientRequest;
use App\Models\User;
use App\Services\PatientService;
use Illuminate\Support\Facades\Auth;

/**
 * @group Patient APIs
 */
class PatientController extends Controller
{
    public function __construct(
        protected PatientService $patientService,
    ) {
    }

    /**
     * Add New Patient
     * 
     * ###For: Mobile (Patient), Web
     * Only non-completed users, and admins are allowed to use this API.
     * (Non-completed users are the users who were created but without specifing their role)
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @responseFile 201 storage/responses/PatientController/store_201_Created.json
     * @responseFile 403 storage/responses/PatientController/store_403_Forbidden.json
     * @responseFile 409 storage/responses/PatientController/store_409_Conflict.json
     */
    public function store(StorePatientRequest $request)
    {
        $user = User::find($request->user_id);
        if ($user->role != null)
            return response()->json([
                'result' => 'Fail',
                'message' => 'User is already a ' . $user->role->value . ', it can\'t be modified',
            ], 409);

        $response = $this->patientService->addNewPatient(PatientDTO::fromRequest($request->validated()));

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $response->data,
        ], $response->statusCode);
    }

    /**
     * Show All Patients
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam per_page integer required The number of patients shown in each page. Defaults to 10. 
     * @responseFile 200 storage/responses/PatientController/index_200_OK.json
     */
    public function index(int $per_page)
    {
        $response = $this->patientService->getAllPatientsPaged($per_page);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $response->data,
        ], $response->statusCode);
    }

    /**
     * Show Specified Patient
     * 
     * ###For: Mobile (Patient, Doctor), Web
     * Everyone in the system can use this API, but patients can only see their own information
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam patientId integer required min:1
     * @responseFile 403 storage/responses/PatientController/show_403_Forbidden.json
     * @responseFile 404 storage/responses/PatientController/show_404_Not_Found.json
     * @responseFile 200 storage/responses/PatientController/show_200_OK.json
     */
    public function show(int $patientId)
    {
        $loggedUser = Auth::user();

        if ($loggedUser->role == UserRoleEnum::PATIENT)
            if ($loggedUser->patient->id != $patientId)
                return response()->json([
                    'result' => 'Fail',
                    'message' => 'Patients can\'t see other patients information'
                ], 403);

        $response = $this->patientService->showPatient($patientId);

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->json([
            'result' => $response->result,
            'data' => $response->data,
        ], $response->statusCode);

    }

    /**
     * Update Patient
     * 
     * ###For: Mobile (Patient), Web
     * Only patients are allowed to use this API.
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam patientId integer required min:1
     * @responseFile 403 storage/responses/PatientController/update_403_Forbidden.json
     * @responseFile 404 storage/responses/PatientController/update_404_Not_Found.json
     * @responseFile 200 storage/responses/PatientController/update_200_OK.json
     * @responseFile 200 storage/responses/PatientController/update_200_2_OK.json
     */
    public function update(UpdatePatientRequest $request, int $patientId)
    {
        $loggedUser = Auth::user();
        if ($loggedUser->patient->id != $patientId) {
            return response()->json([
                'result' => 'Fail',
                'message' => 'Patients can\'t update other patients information'
            ], 403);
        }
        $response = $this->patientService->updatePatient(
            PatientDTOUpdate::fromRequest($request->validated()),
            $patientId
        );

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $response->data,
        ], $response->statusCode);
    }

    /**
     * Delete Patient
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam patientId integer required min:1
     * @responseFile 404 storage/responses/PatientController/destroy_404_Not_Found.json
     * @responseFile 204 storage/responses/PatientController/destroy_204_No_Content.json
     */
    public function destroy(int $patientId)
    {
        $response = $this->patientService->deletePatient($patientId);

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->noContent(204);
    }
}
