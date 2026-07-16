<?php

namespace App\Http\Controllers;

use App\DTOs\Unavailability\UnavailabilityDTO;
use App\Enums\UnavailabilityReasonTypeEnum;
use App\Enums\UnavailabilityTypeEnum;
use App\Enums\UserRoleEnum;
use App\Http\Requests\UnavailabilityController\StoreUnavailabilityRequest;
use App\Http\Resources\Unavailability\UnavailabilityToAdminResource;
use App\Http\Resources\Unavailability\UnavailabilityToDoctorResource;
use App\Services\UnavailabilityService;
use Illuminate\Support\Facades\Auth;

/**
 * @group Unavailability APIs
 */
class UnavailabilityController extends Controller
{
    public function __construct(
        protected UnavailabilityService $unavailabilityService,
    ) {
    }

    private function resource($recordOrCollection, bool $isCollection)
    {
        switch ($this->currentUserRole()) {
            case UserRoleEnum::ADMIN:
                return $isCollection ?
                    UnavailabilityToAdminResource::collection($recordOrCollection) :
                    new UnavailabilityToAdminResource($recordOrCollection);
            case UserRoleEnum::DOCTOR:
                return $isCollection ?
                    UnavailabilityToDoctorResource::collection($recordOrCollection) :
                    new UnavailabilityToDoctorResource($recordOrCollection);
            default:
                return $isCollection ?
                    UnavailabilityToDoctorResource::collection($recordOrCollection) :
                    new UnavailabilityToDoctorResource($recordOrCollection);
        }
    }

    /**
     * Create an unavailability
     * 
     * ###For: Mobile(Doctor), Web
     * Only admins and doctors are allowed to use this API.
     * Creating a new unavailability by a doctor or admin, the doctor can create his own unavailability, 
     * and the admin can create unavailability for medical center.
     * @urlParam maker_id integer required The ID number, Doctor App assigns the ID of the doctor (The doctor_id 
     * not the user_id of the doctor!!). For the Web App, if the admin is creating an unavailability for the 
     * Medical Center, then the app assigns the ID of the admin (The admin_id not the user_id of the admin!!), 
     * and for if the admin is creating an unavailability for a doctor, then the app assigns the ID of that doctor 
     * (The doctor_id not the user_id of the doctor!!).
     */
    public function store(StoreUnavailabilityRequest $request, int $maker_id)
    {
        $user = Auth::user();

        $validatedData = array_merge($request->validated(), [
            'type' => ($user->role == UserRoleEnum::ADMIN && $user->admin->id == $maker_id) ?
                UnavailabilityTypeEnum::MEDICAL_CENTER :
                UnavailabilityTypeEnum::DOCTOR,
        ]);

        $cases = UnavailabilityReasonTypeEnum::cases();
        foreach ($cases as $case)
            if ($case->value == $validatedData['reason_type']) {
                $validatedData['reason_type'] = $case;
                break;
            }

        $response = $this->unavailabilityService->create(
            UnavailabilityDTO::fromRequest($validatedData),
            $maker_id
        );

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }



    /**
     * Paginate unavailabilities of all doctors
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam with_passed integer required Boolean value means does the user want all of unavailabilities to be showen even with the ones from the past?
     * @urlParam per_page integer required The number of items shown in each page, Defaults to 10. 
     */
    public function paginateDoctorsUnavailabilities(bool $with_passed, int $per_page = 10)
    {
        $response = $this->unavailabilityService->paginateDoctorsUnavailabilities($with_passed, $per_page);
        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * Paginate unavailabilities of a specified doctor
     * 
     * ###For: Web, Mobile(Doctor)
     * Only admins and doctors are allowed to use this API.
     * @urlParam with_passed integer required Boolean value means does the user want all of unavailabilities to be showen even with the ones from the past?
     * @urlParam per_page integer required The number of items shown in each page, Defaults to 10. 
     * @urlParam doctor_id integer required The ID of the doctor to view his unavailabilities 
     */
    public function paginateDoctorUnavailabilities(bool $with_passed, int $per_page = 10, int $doctor_id)
    {
        $response = $this->unavailabilityService->paginateDoctorUnavailabilities($with_passed, $per_page, $doctor_id);
        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * Paginate unavailabilities of the medical center
     * 
     * ###For: Web
     * Only admins are allowed to use this API. 
     * @urlParam with_passed integer required Boolean value means does the admin want all of unavailabilities to be showen even with the ones from the past?
     * @urlParam per_page integer required The number of items shown in each page, Defaults to 10. 
     */
    public function paginateMedicalUnavailabilities(bool $with_passed, int $per_page = 10)
    {
        $response = $this->unavailabilityService->paginateMedicalUnavailabilities($with_passed, $per_page);
        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

}
