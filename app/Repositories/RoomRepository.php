<?php

namespace App\Repositories;

use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Models\Room;
use App\Repositories\Interfaces\RoomRepositoryInterface;

class RoomRepository extends Repository implements RoomRepositoryInterface
{
    public function addNewRoom(array $roomData): Response
    {
        return $this->executeCode(function () use ($roomData) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Room::create($roomData),
                201
            );
        });
    }
    public function getAllRoomsPaged(int $per_page = 10): Response
    {
        return $this->executeCode(function () use ($per_page) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Room::orderBy('created_at', 'desc')->paginate($per_page),
            );
        });
    }
    public function getRoomByIdWithAdmin(int $roomId): Response
    {
        return $this->executeCode(function () use ($roomId) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Room::with('lastUpdateByAdmin')->find($roomId)
            );
        });
    }
    public function getRoomById(int $roomId): Response
    {
        return $this->executeCode(function () use ($roomId) {
            return new Response(
                ResponseStatusEnum::SUCCESS,
                null,
                Room::find($roomId)
            );
        });
    }
    public function deleteRoom(Room $room): Response
    {
        return $this->executeCode(function () use ($room) {
            $room->delete();
            return new Response(ResponseStatusEnum::SUCCESS, null, null, 204);
        }, true, true);
    }

}