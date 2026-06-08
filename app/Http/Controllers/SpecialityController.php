<?php

namespace App\Http\Controllers;

use App\DTOs\Speciality\SpecialityDTO;
use App\DTOs\Speciality\SpecialityDTOUpdate;
use App\Http\Requests\SpecialityController\StoreSpecialityRequest;
use App\Http\Requests\SpecialityController\UpdateSpecialityRequest;
use App\Services\SpecialityService;
use Illuminate\Http\JsonResponse;
use App\GeneralClasses\Enums\ResponseStatusEnum;
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

    /**
     * Add New Speciality
     * 
     * ###For: Web
     * Only admins are allowed to use this API. There is a middleware CheckAdmin on this API route
     * @responseFile 201 storage/responses/SpecialityController/store_201_Created.json
     */
    public function store(StoreSpecialityRequest $request): JsonResponse
    {
        $specialityData = $request->validated();
        $specialityData['added_by_admin_id'] = Auth::id();
        $response = $this->specialityService->addNewSpeciality(SpecialityDTO::fromRequest($specialityData));

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
     * View All Specialities
     * 
     * ###For: Mobile(Patient - Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam per_page integer required The number of specialities shown in each page. Defaults to 10. 
     * @responseFile 200 storage/responses/SpecialityController/index_200_OK.json
     */
    public function index(int $per_page): JsonResponse
    {
        $response = $this->specialityService->getAllSpecialitiesPaged($per_page);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $response->data,
        ], $response->statusCode);
    }

    /**
     * View a Specified Speciality
     * 
     * ###For: Mobile(Patient - Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam specialityId integer required min:1 
     * @responseFile 404 storage/responses/SpecialityController/show_404_Not_Found.json
     * @responseFile 200 storage/responses/SpecialityController/show_200_OK.json
     */
    public function show(int $specialityId): JsonResponse
    {
        $response = $this->specialityService->showSpeciality($specialityId);

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
     * Update a Speciality
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam specialityId integer required min:1 
     * @responseFile 404 storage/responses/SpecialityController/update_404_Not_Found.json
     * @responseFile 200 storage/responses/SpecialityController/update_200_OK.json
     * @responseFile 200 storage/responses/SpecialityController/update_200_2_OK.json
     */
    public function update(UpdateSpecialityRequest $request, int $specialityId): JsonResponse
    {
        $response = $this->specialityService->updateSpeciality(
            SpecialityDTOUpdate::fromRequest($request->validated()),
            $specialityId
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
     * Delete a Speciality
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam specialityId integer required min:1 
     * @responseFile 404 storage/responses/SpecialityController/destroy_404_Not_Found.json
     * @responseFile 204 storage/responses/SpecialityController/destroy_204_No_Content.json
     */

    public function destroy(int $specialityId)
    {
        $response = $this->specialityService->deleteSpeciality($specialityId);

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->noContent(204);
    }
}

