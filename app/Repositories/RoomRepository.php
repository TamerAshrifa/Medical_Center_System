<?php

namespace App\Repositories;

use App\Models\Room;
use App\Repositories\Interfaces\RoomRepositoryInterface;

class RoomRepository extends Repository implements RoomRepositoryInterface
{
    public function add(array $roomData): Room
    {
        return Room::create($roomData);
    }
    public function paginate(int $perPage = 10)
    {
        return Room::query()
            ->with([
                'doctor:id,user_id,room_id',
                'doctor.user:id,first_name,last_name,photo',
            ])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
    public function findWithAdmin(int $id, bool $failIfNotExists = true): Room
    {
        $query = Room::query()
            ->with([
                'lastUpdateByAdmin:id,user_id',
                'lastUpdateByAdmin.user:id,first_name,last_name',
            ]);
        return $failIfNotExists ?
            $query->findOrFail($id) :
            $query->find($id);
    }
    public function find(int $id, bool $failIfNotExists = true): Room
    {
        $room = Room::query()->with([
            'doctor:id,user_id,room_id',
            'doctor.user:id,first_name,last_name,photo',
        ]);
        return $failIfNotExists ?
            $room->findOrFail($id) :
            $room->find($id);
    }
    public function delete(Room $room): bool
    {
        return $room->delete() > 0;
    }

}