<?php

namespace App\Http\Controllers;

use App\DTOs\Doctor\DoctorDTO;
use App\DTOs\Doctor\DoctorDTOUpdate;
use App\Http\Requests\DoctorController\StoreDoctorRequest;
use App\Http\Requests\DoctorController\UpdateDoctorRequest;
use App\Services\DoctorService;
use App\GeneralClasses\Enums\ResponseStatusEnum;
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
    /**
     * Add New Doctor
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @responseFile 201 storage/responses/DoctorController/store_201_Created.json
     * @responseFile 409 storage/responses/DoctorController/store_409_Conflict.json
     */
    public function store(StoreDoctorRequest $request)
    {
        $doctorData = $request->validated();
        $doctorData['added_by_admin_id'] = Auth::id();
        $response = $this->doctorService->addNewDoctor(DoctorDTO::fromRequest($doctorData));

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
     * View All Doctors
     * 
     * ###For: Mobile(Patient - Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam per_page integer required The number of doctors shown in each page. Defaults to 10. 
     * @responseFile 200 storage/responses/DoctorController/index_200_OK.json
     */
    public function index(int $per_page)
    {
        $response = $this->doctorService->getAllDoctorsPaged($per_page);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $response->data,
        ], $response->statusCode);
    }

    /**
     * View a Specified Doctor
     * 
     * ###For: Mobile(Patient - Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam doctorId integer required min:1 
     * @responseFile 200 storage/responses/DoctorController/show_200_OK.json
     * @responseFile 404 storage/responses/DoctorController/show_404_Not_Found.json
     */
    public function show(int $doctorId)
    {
        $response = $this->doctorService->showDoctor($doctorId);

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
     * Update a Doctor
     * 
     * ###For: Mobile(Doctor)
     * Only doctors are allowed to use this API.
     * @urlParam doctorId integer required min:1 
     * @responseFile 200 storage/responses/DoctorController/update_200_OK.json
     * @responseFile 200 storage/responses/DoctorController/update_200_2_OK.json
     * @responseFile 403 storage/responses/DoctorController/update_403_Forbidden.json
     * @responseFile 404 storage/responses/DoctorController/update_404_Not_Found.json
     */
    public function update(UpdateDoctorRequest $request, int $doctorId)
    {
        if (Auth::user()->doctor->id != $doctorId) {
            return response()->json([
                'result' => 'Fail',
                'message' => 'Doctors can\'t update other doctors information'
            ], 403);
        }

        $response = $this->doctorService->updateDoctor(
            DoctorDTOUpdate::fromRequest($request->validated()),
            $doctorId
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
     * Delete a Doctor
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam doctorId integer required min:1 
     * @responseFile 204 storage/responses/DoctorController/destroy_204_No_Content.json
     * @responseFile 404 storage/responses/DoctorController/destroy_404_Not_Found.json
     */
    public function destroy(int $doctorId)
    {
        $response = $this->doctorService->deleteDoctor($doctorId);

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->noContent(204);
    }

}
