<?php

namespace App\Http\Controllers;

use App\DTOs\Visit\VisitDTOUpdate;
use App\Enums\UserRoleEnum;
use App\Http\Requests\VisitController\UpdateVisitRequest;
use App\Http\Resources\Visit\VisitToAdminResource;
use App\Http\Resources\Visit\VisitToDoctorResource;
use App\Http\Resources\Visit\VisitToPatientResource;
use App\Services\VisitService;

/**
 * @group Visit APIs
 */
class VisitController extends Controller
{

    private function resource($visitOrCollectionOfIt, bool $isCollection)
    {
        switch ($this->currentUserRole()) {
            case UserRoleEnum::ADMIN:
                return $isCollection ?
                    VisitToAdminResource::collection($visitOrCollectionOfIt) :
                    new VisitToAdminResource($visitOrCollectionOfIt);
            case UserRoleEnum::DOCTOR:
                return $isCollection ?
                    VisitToDoctorResource::collection($visitOrCollectionOfIt) :
                    new VisitToDoctorResource($visitOrCollectionOfIt);
            case UserRoleEnum::PATIENT:
                return $isCollection ?
                    VisitToPatientResource::collection($visitOrCollectionOfIt) :
                    new VisitToPatientResource($visitOrCollectionOfIt);
            default:
                return $isCollection ?
                    VisitToPatientResource::collection($visitOrCollectionOfIt) :
                    new VisitToPatientResource($visitOrCollectionOfIt);
        }
    }

    public function __construct(
        protected VisitService $visitService,
    ) {
    }


    /**
     * View all visits in the system
     * 
     * ###For: Web
     * Only admins are allowed to use this API
     * @urlParam per_page integer required min:1 The number of items be shown in each page. Defaults to 10. 
     */
    public function paginate(int $per_page = 10)
    {
        $response = $this->visitService->paginate($per_page);

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View all visits of a specified doctor
     * 
     * ###For: Web, Mobile(Doctor)
     * Only admins and doctors are allowed to use this API
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam per_page integer required min:1 The number of items be shown in each page. Defaults to 10. 
     * @urlParam doctor_id integer required min:1 The ID number of doctor to view it's visits 
     */
    public function paginateDoctorVisits(int $per_page = 10, int $doctor_id)
    {
        $response = $this->visitService->paginateDoctorVisits($per_page, $doctor_id);

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View all visits of a specified patient
     * 
     * ###For: Web, Mobile(Patient)
     * Only admins and patients are allowed to use this API
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam per_page integer required min:1 The number of items be shown in each page. Defaults to 10. 
     * @urlParam patient_id integer required min:1 The ID number of patient to view it's visits 
     */
    public function paginatePatientVisits(int $per_page = 10, int $patient_id)
    {
        $response = $this->visitService->paginatePatientVisits($per_page, $patient_id);

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View a specified visit
     * 
     * ###For: Web, Mobile(Patient, Doctor)
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * Everyone in the system is allowed to use this API
     * @urlParam id integer required min:1 The ID number of visit to be showen 
     */
    public function show(int $id)
    {
        $response = $this->visitService->find(true, true, $id);

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * Update a specified visit
     * 
     * ###For: Mobile(Doctor)
     * Only doctors are allowed to use this API
     * @urlParam id integer required min:1 The ID number of visit to be updated 
     */
    public function update(UpdateVisitRequest $request, int $id)
    {
        $response = $this->visitService->update(VisitDTOUpdate::fromRequest($request->validated()), $id);

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

}

