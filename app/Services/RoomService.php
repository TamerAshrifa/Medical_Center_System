<?php

namespace App\Services;

use App\DTOs\Room\RoomDTO;
use App\DTOs\Room\RoomDTOUpdate;
use App\Enums\UserRoleEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Http\Resources\RoomToAdminResource;
use App\Http\Resources\RoomToDoctorResource;
use App\Http\Resources\RoomToPatientResource;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class RoomService extends Service
{
    public function __construct(
        protected RoomRepositoryInterface $roomRepository,
    ) {
    }
    private function getRoomResource(&$roomOrCollectionOfIt, bool $isCollection)
    {
        switch ($this->getCurrentUserRole()) {
            case UserRoleEnum::ADMIN:
                if ($isCollection)
                    return RoomToAdminResource::collection($roomOrCollectionOfIt);
                return new RoomToAdminResource($roomOrCollectionOfIt);
            case UserRoleEnum::PATIENT:
                if ($isCollection)
                    return RoomToPatientResource::collection($roomOrCollectionOfIt);
                return new RoomToPatientResource($roomOrCollectionOfIt);
            case UserRoleEnum::DOCTOR:
                if ($isCollection)
                    return RoomToDoctorResource::collection($roomOrCollectionOfIt);
                return new RoomToDoctorResource($roomOrCollectionOfIt);
        }
    }
    public function getAllRoomsPaged(int $per_page = 10): Response
    {
        $response = $this->roomRepository->getAllRoomsPaged($per_page);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $rooms = $response->data;
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "result" => "Success",
                "current_page_number" => $rooms->currentPage(),
                "last_page_number" => $rooms->lastPage(),
                "rooms_per_page" => $rooms->perPage(),
                "next_page_url" => $rooms->nextPageUrl(),
                "previous_page_url" => $rooms->previousPageUrl(),
                "first_page_url" => $rooms->url(1),
                "last_page_url" => $rooms->url($rooms->lastPage()),
                "total_rooms_number" => $rooms->total(),
            ],
            RoomToAdminResource::collection($rooms->items()),
        );
    }
    public function addNewRoom(RoomDTO $roomDTO): Response
    {
        $response = $this->roomRepository->addNewRoom($roomDTO->toArray());
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $addedRoom = $response->data;
        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Room added successfully'),
            new RoomToAdminResource($addedRoom),
            201
        );
    }
    public function showRoom(int $roomId): Response
    {
        $response = $this->roomRepository->getRoomByIdWithAdmin($roomId);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $room = $response->data;
        if ($room == null) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Room not found'),
                null,
                404,
            );
        }

        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->getRoomResource($room, false),
        );
    }
    public function updateRoom(RoomDTOUpdate $roomDTO, int $roomId): Response
    {
        $response = $this->roomRepository->getRoomById($roomId);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $room = $response->data;
        if ($room == null) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Room not found'),
                null,
                404
            );
        }

        $roomArray = $roomDTO->toArray();
        $room->fill($roomArray); // This method doesn't save into database, just fill the model with the new data,
        //  and then we can check if there are any changes or not using isDirty() method
        if (!$room->isDirty()) {
            return new Response(
                ResponseStatusEnum::NOTHING,
                Response::messageToArray('No changes detected'),
            );
        }

        $room->last_update_by_admin_id = Auth::id();
        $room->save();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Room updated successfully'),
            new RoomToAdminResource($room),
        );
    }
    public function deleteRoom(int $roomId): Response
    {
        $response = $this->roomRepository->getRoomById($roomId);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        $room = $response->data;
        if ($room == null) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Room not found'),
                null,
                404
            );
        }

        $response = $this->roomRepository->deleteRoom($room);
        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            null,
            204
        );
    }

}