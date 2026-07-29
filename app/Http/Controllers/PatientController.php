<?php

namespace App\Http\Controllers;

use App\DTOs\Patient\PatientDTO;
use App\DTOs\Patient\PatientDTOUpdate;
use App\Enums\UserRoleEnum;
use App\Http\Requests\PatientController\StorePatientRequest;
use App\Http\Requests\PatientController\UpdatePatientRequest;
use App\Http\Resources\Patient\PatientToAdminResource;
use App\Http\Resources\Patient\PatientToDoctorResource;
use App\Http\Resources\Patient\PatientToItselfResource;
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
    private function resource($recordOrCollection, bool $isCollection)
    {
        switch ($this->currentUserRole()) {
            case UserRoleEnum::ADMIN:
                if ($isCollection)
                    return PatientToAdminResource::collection($recordOrCollection);
                return new PatientToAdminResource($recordOrCollection);
            case UserRoleEnum::DOCTOR:
                if ($isCollection)
                    return PatientToDoctorResource::collection($recordOrCollection);
                return new PatientToDoctorResource($recordOrCollection);
            case UserRoleEnum::PATIENT:
                if ($isCollection)
                    return PatientToItselfResource::collection($recordOrCollection);
                return new PatientToItselfResource($recordOrCollection);
        }
    }
    /**
     * Add New Patient
     * 
     * ###For: Mobile (Patient), Web
     * Only non-completed users, and admins are allowed to use this API.
     * (Non-completed users are the users who were created but without specifing their role)
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     */
    public function store(StorePatientRequest $request)
    {
        $user = User::find($request->user_id);
        if ($user->role != null)
            return response()->json([
                'did_succeed' => false,
                'message' => 'User is already a ' . $user->role->value . ', it can\'t be modified',
            ], 409);

        $response = $this->patientService->add(PatientDTO::fromRequest($request->validated()));

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * Show All Patients
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @responseFile 200 storage/responses/PatientController/index_200_OK.json
     */
    public function index()
    {
        $response = $this->patientService->paginate();

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * Show Specified Patient
     * 
     * ###For: Mobile (Patient, Doctor), Web
     * Everyone in the system can use this API, but patients can only see their own information
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam id integer required min:1
     * @responseFile 403 storage/responses/PatientController/show_403_Forbidden.json
     * @responseFile 404 storage/responses/PatientController/show_404_Not_Found.json
     * @responseFile 200 storage/responses/PatientController/show_200_OK.json
     */
    public function show(int $id)
    {
        $response = $this->patientService->show($id);

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * Update Patient
     * 
     * ###For: Mobile (Patient)
     * Only patients are allowed to use this API.
     * @urlParam patientId integer required min:1
     * @responseFile 403 storage/responses/PatientController/update_403_Forbidden.json
     * @responseFile 404 storage/responses/PatientController/update_404_Not_Found.json
     * @responseFile 200 storage/responses/PatientController/update_200_OK.json
     * @responseFile 200 storage/responses/PatientController/update_200_2_OK.json
     */
    public function update(UpdatePatientRequest $request, int $id)
    {
        $response = $this->patientService->update(
            PatientDTOUpdate::fromRequest($request->validated()),
            $id
        );

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * Delete Patient
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam id integer required
     * @responseFile 404 storage/responses/PatientController/destroy_404_Not_Found.json
     * @responseFile 204 storage/responses/PatientController/destroy_204_No_Content.json
     */
    public function destroy(int $id)
    {
        $response = $this->patientService->delete($id);

        if (!$response->did_succeed)
            return $this->jsonResponse($response);

        return response()->noContent(204);
    }

    /**
     * Search for a Patient
     * 
     * ###For: Mobile(Doctor), Web
     * Only Doctors and Admins are allowed to use this API.
     * This API is to search for a patient by first_name, returns a collection of patients have similar first_name
     * @urlParam search_word string required 
     */
    public function search(string $search_word)
    {
        $response = $this->patientService->search($search_word);

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

}
