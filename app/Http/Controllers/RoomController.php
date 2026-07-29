<?php

namespace App\Http\Controllers;

use App\DTOs\Room\RoomDTO;
use App\DTOs\Room\RoomDTOUpdate;
use App\Enums\UserRoleEnum;
use App\Http\Requests\RoomController\StoreRoomRequest;
use App\Http\Requests\RoomController\UpdateRoomRequest;
use App\Http\Resources\Room\RoomToAdminResource;
use App\Http\Resources\Room\RoomToDoctorResource;
use App\Http\Resources\Room\RoomToPatientResource;
use App\Services\RoomService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * @group Room APIs
 */
class RoomController extends Controller
{
    public function __construct(
        protected RoomService $roomService,
    ) {
    }
    private function resource($recordOrCollection, bool $isCollection)
    {
        switch ($this->currentUserRole()) {
            case UserRoleEnum::ADMIN:
                if ($isCollection)
                    return RoomToAdminResource::collection($recordOrCollection);
                return new RoomToAdminResource($recordOrCollection);
            case UserRoleEnum::DOCTOR:
                if ($isCollection)
                    return RoomToDoctorResource::collection($recordOrCollection);
                return new RoomToDoctorResource($recordOrCollection);
            case UserRoleEnum::PATIENT:
                if ($isCollection)
                    return RoomToPatientResource::collection($recordOrCollection);
                return new RoomToPatientResource($recordOrCollection);

        }
    }
    /**
     * Add New Room
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @responseFile 201 storage/responses/RoomController/store_201_Created.json
     */
    public function store(StoreRoomRequest $request): JsonResponse
    {
        $roomData = array_merge($request->validated(), [
            'last_update_by_admin_id' => Auth::id(),
        ]);
        $response = $this->roomService->add(RoomDTO::fromRequest($roomData));

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * View All Rooms
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @responseFile 201 storage/responses/RoomController/index_200_OK.json
     */
    public function index(): JsonResponse
    {
        $response = $this->roomService->paginate();

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }

    /**
     * View a Specified Room
     * 
     * ###For: Mobile(Patient - Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam roomId integer required min:1 
     * @responseFile 404 storage/responses/RoomController/store_404_Not_Found.json
     * @responseFile 200 storage/responses/RoomController/show_200_OK.json
     */
    public function show(int $roomId): JsonResponse
    {
        $response = $this->roomService->show($roomId);

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * Update Room
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam roomId integer required min:1
     * @responseFile 404 storage/responses/RoomController/update_404_Not_Found.json
     * @responseFile 200 storage/responses/RoomController/update_200_OK.json
     * @responseFile 200 storage/responses/RoomController/update_200_2_OK.json
     */
    public function update(UpdateRoomRequest $request, int $roomId): JsonResponse
    {
        $response = $this->roomService->update(RoomDTOUpdate::fromRequest($request->validated()), $roomId);

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
    }

    /**
     * Delete Room
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam roomId integer required min:1
     * @responseFile 404 storage/responses/RoomController/destroy_404_Not_Found.json
     * @responseFile 204 storage/responses/RoomController/destroy_204_No_Content.json
     */
    public function destroy(int $roomId)
    {
        $response = $this->roomService->delete($roomId);

        if (!$response->did_succeed)
            return $this->jsonResponse($response);

        return response()->noContent(204);
    }
}
