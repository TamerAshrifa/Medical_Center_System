<?php

namespace App\Http\Controllers;

use App\DTOs\User\DoctorSpecialityDTO;
use App\DTOs\User\DoctorSpecialityDTOUpdate;
use App\Enums\UserRoleEnum;
use App\Http\Requests\DoctorSpeciality\StoreDoctorSpecialityRequest;
use App\Http\Requests\DoctorSpeciality\UpdateDoctorSpecialityRequest;
use App\Http\Resources\DoctorSpeciality\DoctorSpecialityToAdminResource;
use App\Http\Resources\DoctorSpeciality\DoctorSpecialityToDoctorResource;
use App\Http\Resources\DoctorSpeciality\DoctorSpecialityToOwnerResource;
use App\Http\Resources\DoctorSpeciality\DoctorSpecialityToPatientResource;
use App\Services\DoctorSpecialityService;
use Illuminate\Support\Facades\Auth;

/**
 * @group Doctor_Speciality APIs
 */
class DoctorSpecialityController extends Controller
{
    public function __construct(
        protected DoctorSpecialityService $doctorSpecialityService,
    ) {
    }

    private function resource(&$doctorSpecialityOrCollectionOfIt, bool $isCollection)
    {
        switch ($this->currentUserRole()) {
            case UserRoleEnum::ADMIN:
                if ($isCollection)
                    return DoctorSpecialityToAdminResource::collection($doctorSpecialityOrCollectionOfIt);
                return new DoctorSpecialityToAdminResource($doctorSpecialityOrCollectionOfIt);
            case UserRoleEnum::PATIENT:
                if ($isCollection)
                    return DoctorSpecialityToPatientResource::collection($doctorSpecialityOrCollectionOfIt);
                return new DoctorSpecialityToPatientResource($doctorSpecialityOrCollectionOfIt);
            case UserRoleEnum::DOCTOR: {
                $isOwner = $doctorSpecialityOrCollectionOfIt->first()->doctor_id == Auth::user()->doctor->id;
                if ($isCollection) {
                    if (!$doctorSpecialityOrCollectionOfIt->isEmpty()) {
                        if ($isOwner)
                            return DoctorSpecialityToOwnerResource::collection($doctorSpecialityOrCollectionOfIt);
                        return DoctorSpecialityToDoctorResource::collection($doctorSpecialityOrCollectionOfIt);
                    }
                    return DoctorSpecialityToDoctorResource::collection($doctorSpecialityOrCollectionOfIt);
                } else {
                    if ($isOwner)
                        return new DoctorSpecialityToOwnerResource($doctorSpecialityOrCollectionOfIt);
                    return new DoctorSpecialityToDoctorResource($doctorSpecialityOrCollectionOfIt);
                }
            }
            default:
                if ($isCollection)
                    return DoctorSpecialityToPatientResource::collection($doctorSpecialityOrCollectionOfIt);
                return new DoctorSpecialityToPatientResource($doctorSpecialityOrCollectionOfIt);
        }
    }

    /**
     * Add New Speciality to a Doctor
     * 
     * ###For: Mobile(Doctor)
     * Only doctors are allowed to use this API.
     */
    public function store(StoreDoctorSpecialityRequest $request)
    {
        $doctorData = array_merge($request->validated(), [
            'doctor_id' => Auth::id()
        ]);

        $response = $this->doctorSpecialityService->create(DoctorSpecialityDTO::fromRequest($doctorData));

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * Paginate Doctors' Specialities
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam per_page integer required The number of doctors shown in each page. Defaults to 10. 
     */
    public function index(int $per_page)
    {
        $response = $this->doctorSpecialityService->paginate($per_page);

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * All Specialities of a Doctor
     * 
     * ###For: Mobile(Patient, Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info 1: The response's "data" field content would change based on the logged-in user role!
     * ###⚠ Important Info 2: If the logged-in user is the owner doctor himself, the response's "data" field content would have more details than what other doctors can see!
     * @urlParam doctorId integer required min:1 
     */
    public function indexForDoctor(int $doctor_id)
    {
        $response = $this->doctorSpecialityService->allForDoctor($doctor_id);

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * All Doctors of a Speciality
     * 
     * ###For: Mobile(Patient, Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam specialityId integer required min:1 
     */
    public function indexForSpeciality(int $speciality_id)
    {
        $response = $this->doctorSpecialityService->allForSpeciality($speciality_id);

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View a Specified Doctor-Speciality
     * 
     * ###For: Mobile(Patient - Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info 1: The response's "data" field content would change based on the logged-in user role!
     * ###⚠ Important Info 2: If the logged-in user is the owner doctor himself, the response's "data" field content would have more details than what other doctors can see!
     * @urlParam id integer required min:1 
     */
    public function show(int $id)
    {
        $response = $this->doctorSpecialityService->find($id);

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * Update a Speciality of a Doctor
     * 
     * ###For: Mobile(Doctor)
     * Only doctors are allowed to use this API.
     * @urlParam id integer required min:1 
     */
    public function update(UpdateDoctorSpecialityRequest $request, int $id)
    {
        $response = $this->doctorSpecialityService->update(
            $id,
            DoctorSpecialityDTOUpdate::fromRequest($request->validated()),
        );

        return $this->jsonResponse($response);
    }

    /**
     * Delete a Speciality from a Doctor Specialities
     * 
     * ###For: Mobile(Doctor)
     * Only doctors are allowed to use this API.
     * @urlParam id integer required min:1 
     */
    public function destroy(int $id)
    {
        $response = $this->doctorSpecialityService->delete($id);
        if (!$response->did_succeed)
            return $this->jsonResponse($response);

        return response()->noContent(204);
    }

}
