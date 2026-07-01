<?php

namespace App\Repositories\Interfaces;

use App\Models\Room;

interface RoomRepositoryInterface extends RepositoryInterface
{
    public function add(array $roomData): Room;
    public function paginate(int $perPage = 10);
    public function findWithAdmin(int $id, bool $failIfNotExists = true): Room;
    public function find(int $id, bool $failIfNotExists = true): Room;
    public function delete(Room $room): bool;
}
