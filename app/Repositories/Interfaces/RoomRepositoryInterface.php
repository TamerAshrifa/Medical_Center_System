<?php

namespace App\Repositories\Interfaces;

use App\GeneralClasses\Response;
use App\Models\Room;

interface RoomRepositoryInterface extends RepositoryInterface
{
    public function addNewRoom(array $roomData): Response;
    public function getAllRoomsPaged(int $numberOfRoomsInPage = 10): Response;
    public function getRoomByIdWithAdmin(int $roomId): Response;
    public function getRoomById(int $roomId): Response;
    public function deleteRoom(Room $room): Response;
}
