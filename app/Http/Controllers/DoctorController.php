<?php

namespace App\Http\Controllers;

use App\DTOs\Doctor\DoctorDTO;
use App\DTOs\Doctor\DoctorDTOUpdate;
use App\Enums\UserRoleEnum;
use App\Http\Requests\DoctorController\StoreDoctorRequest;
use App\Http\Requests\DoctorController\UpdateDoctorRequest;
use App\Http\Resources\Doctor\DoctorToAdminResource;
use App\Http\Resources\Doctor\DoctorToDoctorResource;
use App\Http\Resources\Doctor\DoctorToPatientResource;
use App\Services\DoctorService;
use Illuminate\Support\Facades\Auth;

/**
 * @group Doctor APIs
 */
class DoctorController extends Controller
{

    public function __construct(
        protected DoctorService $doctorService,
    ) {
    }

    private function resource(&$recordOrCollection, bool $isCollection)
    {
        switch ($this->currentUserRole()) {
            case UserRoleEnum::ADMIN:
                if ($isCollection)
                    return DoctorToAdminResource::collection($recordOrCollection);
                return new DoctorToAdminResource($recordOrCollection);
            case UserRoleEnum::PATIENT:
                if ($isCollection)
                    return DoctorToPatientResource::collection($recordOrCollection);
                return new DoctorToPatientResource($recordOrCollection);
            case UserRoleEnum::DOCTOR:
                if ($isCollection)
                    return DoctorToDoctorResource::collection($recordOrCollection);
                return new DoctorToDoctorResource($recordOrCollection);
        }
    }

    /**
     * Add New Doctor
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     */
    public function store(StoreDoctorRequest $request)
    {
        $doctorData = array_merge($request->validated(), [
            'added_by_admin_id' => Auth::user()->admin->id
        ]);
        $response = $this->doctorService->add(DoctorDTO::fromRequest($doctorData));

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * View All Doctors
     * 
     * ###For: Mobile(Patient - Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam with_unactive boolean required Getting Doctors with unactive ones or only the actives?
     */
    public function index(bool $with_unactive)
    {
        $userRole = $this->currentUserRole();
        if (
            $userRole == UserRoleEnum::PATIENT ||
            $userRole == UserRoleEnum::DOCTOR
        )
            $with_unactive = false;

        $response = $this->doctorService->paginate($with_unactive, $userRole);

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View a Specified Doctor
     * 
     * ###For: Mobile(Patient - Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam doctor_id integer required 
     */
    public function show(int $doctor_id)
    {
        $response = $this->doctorService->show($doctor_id, $this->currentUserRole());

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * Search for a Doctor
     * 
     * ###For: Mobile(Patient - Doctor), Web
     * Everyone in the system is allowed to use this API.
     * This API is to search for a doctor by first_name, returns a collection of doctors have similar first_name
     * @urlParam search_word string required 
     */
    public function search(string $search_word)
    {
        $isSearcherAdmin = $this->currentUserRole() == UserRoleEnum::ADMIN;
        $response = $this->doctorService->search($search_word, $isSearcherAdmin);

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * Update a Doctor
     * 
     * ###For: Mobile(Doctor)
     * Only doctors are allowed to use this API.
     * @urlParam doctorId integer required min:1 
     */
    public function update(UpdateDoctorRequest $request, int $doctor_id)
    {
        $response = $this->doctorService->update(
            DoctorDTOUpdate::fromRequest($request->validated()),
            $doctor_id
        );

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * Delete a Doctor
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam doctorId integer required min:1 
     */
    public function destroy(int $doctorId)
    {
        $response = $this->doctorService->delete($doctorId);

        if (!$response->did_succeed)
            return $this->jsonResponse($response);

        return response()->noContent(204);
    }

    /**
     * Deactivate a Doctor
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam id integer required The ID of doctor
     */
    public function deactivate(int $id)
    {
        $response = $this->doctorService->deactivate($id);

        return $this->jsonResponse($response);
    }

    /**
     * Activate a Doctor
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam id integer required The ID of doctor
     * @urlParam room_id integer required The ID of room to assign the doctor to
     */
    public function activate(int $id, int $room_id)
    {
        $response = $this->doctorService->activate($id, $room_id);

        return $this->jsonResponse($response);
    }

}
