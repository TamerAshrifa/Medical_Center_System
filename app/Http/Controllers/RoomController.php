<?php

namespace App\Http\Controllers;

use App\DTOs\Room\RoomDTO;
use App\DTOs\Room\RoomDTOUpdate;
use App\Http\Requests\RoomController\StoreRoomRequest;
use App\Http\Requests\RoomController\UpdateRoomRequest;
use App\Services\RoomService;
use Illuminate\Http\JsonResponse;
use App\GeneralClasses\Enums\ResponseStatusEnum;
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

    /**
     * Add New Room
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @responseFile 201 storage/responses/RoomController/store_201_Created.json
     */
    public function store(StoreRoomRequest $request): JsonResponse
    {
        $roomData = $request->validated();
        $roomData['last_update_by_admin_id'] = Auth::id();
        $response = $this->roomService->addNewRoom(RoomDTO::fromRequest($roomData));

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
     * View All Rooms
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam per_page integer required The number of rooms shown in each page. Defaults to 10. 
     * @responseFile 201 storage/responses/RoomController/index_200_OK.json
     */
    public function index(int $per_page): JsonResponse
    {
        $response = $this->roomService->getAllRoomsPaged($per_page);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $response->data,
        ], $response->statusCode);
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
        $response = $this->roomService->showRoom($roomId);

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
        $response = $this->roomService->updateRoom(RoomDTOUpdate::fromRequest($request->validated()), $roomId);

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
        $response = $this->roomService->deleteRoom($roomId);

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->noContent(204);
    }
}
