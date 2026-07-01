<?php

namespace App\Http\Controllers;

use App\DTOs\PatientComplaint\PatientComplaintDTO;
use App\Enums\UserRoleEnum;
use App\Http\Requests\PatientComplaintController\StoreRequest;
use App\Http\Resources\PatientComplaint\PatientComplaintToAdminResource;
use App\Http\Resources\PatientComplaint\PatientComplaintToPatientResource;
use App\Services\PatientComplaintService;
use Illuminate\Support\Facades\Auth;

/**
 * @group Patient Complaint APIs
 */
class PatientComplaintController extends Controller
{
    public function __construct(
        protected PatientComplaintService $patientComplaintService,
    ) {
    }

    private function resource($recordOrCollectionOfIt, bool $isCollection)
    {
        switch (Auth::user()->role) {
            case UserRoleEnum::ADMIN:
                return $isCollection ?
                    PatientComplaintToAdminResource::collection($recordOrCollectionOfIt) :
                    new PatientComplaintToAdminResource($recordOrCollectionOfIt);
            case UserRoleEnum::PATIENT:
                return $isCollection ?
                    PatientComplaintToPatientResource::collection($recordOrCollectionOfIt) :
                    new PatientComplaintToPatientResource($recordOrCollectionOfIt);
            default:
                return $isCollection ?
                    PatientComplaintToPatientResource::collection($recordOrCollectionOfIt) :
                    new PatientComplaintToPatientResource($recordOrCollectionOfIt);
        }
    }

    /**
     * Make a Complaint
     * 
     * ###For: Mobile(Patient)
     * Only patients are allowed to use this API.
     */
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['patient_id'] = Auth::user()->patient->id;

        $response = $this->patientComplaintService->create(PatientComplaintDTO::fromRequest($validatedData));

        return $this->jsonResponse($response);
    }

    /**
     * View all complaints made by a specified patient
     * 
     * ###For: Web, Mobile(Patient)
     * Only admins and patients are allowed to use this API
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam patient_id integer required min:1 The ID number of patient to view all his Complaints
     */
    public function allPatientComplaints(int $patient_id)
    {
        $response = $this->patientComplaintService->allPatientComplaints($patient_id);
        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View all Patients' Complaints
     * 
     * ###For: Web
     * Only admins are allowed to use this API
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam per_page integer required min:1 The number of items be shown in each page. Defaults to 10. 
     * @urlParam with_reviewed integer required Boolean value means does the admin want all of the complaints to be showen even with reviewed ones?
     */
    public function paginate(int $per_page = 10, bool $with_reviewed)
    {

        $response = $this->patientComplaintService->paginate($per_page, $with_reviewed);

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * Show a Patient-Complaint
     *
     * ###For: Web, Mobile(Patient)
     * Only admins and patients are allowed to use this API
     * @urlParam id integer required The ID number of medical access record to be shown
     */
    public function show(int $id)
    {
        $response = $this->patientComplaintService->find($id);
        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * Make a Patient-Complaint Reviewed
     * 
     * ###For: Web
     * Only admins are allowed to use this API
     * @urlParam reply string required
     * @urlParam id integer required The ID number of medical access record to be revoked
     */
    public function makePatientComplaintReviewed(string $reply, int $id)
    {
        $response = $this->patientComplaintService->makeReviewed($reply, Auth::user()->admin->id, $id);

        return $this->jsonResponse($response);
    }

}
