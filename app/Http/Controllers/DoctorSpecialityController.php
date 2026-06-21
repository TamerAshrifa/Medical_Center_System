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
use App\GeneralClasses\Enums\ResponseStatusEnum;
use Illuminate\Support\Facades\Auth;

/**
 * @group Doctor_Speciality APIs
 */
class DoctorSpecialityController extends Controller
{
    private function resource(&$doctorSpecialityOrCollectionOfIt, bool $isCollection)
    {
        switch ($this->getCurrentUserRole()) {
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
    public function __construct(
        protected DoctorSpecialityService $doctorSpecialityService,
    ) {
    }

    /**
     * Add New Speciality to a Doctor
     * 
     * ###For: Mobile(Doctor)
     * Only doctors are allowed to use this API.
     */
    public function store(StoreDoctorSpecialityRequest $request)
    {
        $doctorData = $request->validated();
        $doctorData['doctor_id'] = Auth::id();

        $response = $this->doctorSpecialityService->create(DoctorSpecialityDTO::fromRequest($doctorData));
        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, false),
        ], $response->statusCode);
    }

    /**
     * View All Doctors' Specialities
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam per_page integer required The number of doctors shown in each page. Defaults to 10. 
     */
    public function index(int $per_page)
    {
        $response = $this->doctorSpecialityService->paginate($per_page);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
    }

    /**
     * View All Specialities of a Doctor
     * 
     * ###For: Mobile(Patient, Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info 1: The response's "data" field content would change based on the logged-in user role!
     * ###⚠ Important Info 2: If the logged-in user is the owner doctor himself, the response's "data" field content would have more details than what other doctors can see!
     * @urlParam doctorId integer required min:1 
     */
    public function indexForDoctor(int $doctorId)
    {
        $response = $this->doctorSpecialityService->allForDoctor($doctorId);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
    }

    /**
     * View All Doctors of a Speciality
     * 
     * ###For: Mobile(Patient, Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam specialityId integer required min:1 
     */
    public function indexForSpeciality(int $specialityId)
    {
        $response = $this->doctorSpecialityService->allForSpeciality($specialityId);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
    }

    /**
     * View a Specified Doctor_Speciality
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

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->json([
            'result' => $response->result,
            'data' => $this->resource($response->data, false),
        ], $response->statusCode);
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
        if (Auth::user()->doctor->id != $this->doctorSpecialityService->find($id)->data->doctor_id) {
            return response()->json([
                'result' => 'Fail',
                'message' => 'Doctors can only edit their own specialities'
            ], 403);
        }

        $response = $this->doctorSpecialityService->update(
            $id,
            DoctorSpecialityDTOUpdate::fromRequest($request->validated()),
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
     * Delete a Speciality from a Doctor Specialities
     * 
     * ###For: Mobile(Doctor)
     * Only doctors are allowed to use this API.
     * @urlParam id integer required min:1 
     */
    public function destroy(int $id)
    {
        $response = $this->doctorSpecialityService->delete($id);

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->noContent(204);
    }

}
