<?php

namespace App\Http\Controllers;

use App\DTOs\Speciality\SpecialityDTO;
use App\DTOs\Speciality\SpecialityDTOUpdate;
use App\Enums\UserRoleEnum;
use App\Http\Requests\SpecialityController\StoreSpecialityRequest;
use App\Http\Requests\SpecialityController\UpdateSpecialityRequest;
use App\Http\Resources\Speciality\SpecialityToAdminResource;
use App\Http\Resources\Speciality\SpecialityToDoctorResource;
use App\Http\Resources\Speciality\SpecialityToPatientResource;
use App\Services\SpecialityService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * @group Speciality APIs
 */
class SpecialityController extends Controller
{
    public function __construct(
        protected SpecialityService $specialityService,
    ) {
    }
    private function resource(&$recordOrCollection, bool $isCollection)
    {
        switch ($this->currentUserRole()) {
            case UserRoleEnum::ADMIN:
                if ($isCollection)
                    return SpecialityToAdminResource::collection($recordOrCollection);
                return new SpecialityToAdminResource($recordOrCollection);
            case UserRoleEnum::PATIENT:
                if ($isCollection)
                    return SpecialityToPatientResource::collection($recordOrCollection);
                return new SpecialityToPatientResource($recordOrCollection);
            case UserRoleEnum::DOCTOR:
                if ($isCollection)
                    return SpecialityToDoctorResource::collection($recordOrCollection);
                return new SpecialityToDoctorResource($recordOrCollection);
        }
    }
    /**
     * Add New Speciality
     * 
     * ###For: Web
     * Only admins are allowed to use this API. There is a middleware CheckAdmin on this API route
     */
    public function store(StoreSpecialityRequest $request): JsonResponse
    {
        $specialityData = array_merge($request->validated(), [
            'added_by_admin_id' => Auth::user()->admin->id,
        ]);
        $response = $this->specialityService->add(SpecialityDTO::fromRequest($specialityData));

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * View All Specialities
     * 
     * ###For: Mobile(Patient - Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     */
    public function index(): JsonResponse
    {
        $response = $this->specialityService->paginate($this->currentUserRole());

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View a Specified Speciality
     * 
     * ###For: Mobile(Patient - Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam specialityId integer required min:1 
     */
    public function show(int $specialityId): JsonResponse
    {
        $response = $this->specialityService->show($specialityId, $this->currentUserRole());

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * Update a Speciality
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam specialityId integer required min:1 
     */
    public function update(UpdateSpecialityRequest $request, int $specialityId): JsonResponse
    {
        $response = $this->specialityService->update(
            SpecialityDTOUpdate::fromRequest($request->validated()),
            $specialityId
        );

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * Delete a Speciality
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam specialityId integer required min:1 
     */

    public function destroy(int $specialityId)
    {
        $response = $this->specialityService->delete($specialityId);

        if (!$response->did_succeed)
            return $this->jsonResponse($response);

        return response()->noContent(204);
    }
}

