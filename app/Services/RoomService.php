<?php

namespace App\Services;

use App\DTOs\Room\RoomDTO;
use App\DTOs\Room\RoomDTOUpdate;

use App\GeneralClasses\Response;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class RoomService extends Service
{
    public function __construct(
        protected RoomRepositoryInterface $roomRepository,
    ) {
    }

    public function paginate(int $perPage = 10): Response
    {
        $records = $this->roomRepository->paginate($perPage);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items(),
        );
    }
    public function add(RoomDTO $dto): Response
    {
        return new Response(
            true,
            Response::messageToArray('Room added successfully'),
            $this->roomRepository->add($dto->toArray()),
            201
        );
    }
    public function show(int $id): Response
    {
        return new Response(
            true,
            null,
            $this->roomRepository->findWithAdmin($id),
        );
    }
    public function update(RoomDTOUpdate $dto, int $id): Response
    {
        $room = $this->roomRepository->find($id);

        $roomArray = $dto->toArray();
        $room->fill($roomArray); // This method doesn't save into database, just fill the model with the new data,
        //  and then we can check if there are any changes or not using isDirty() method
        if (!$room->isDirty()) {
            return new Response(
                true,
                Response::messageToArray('No changes detected'),
            );
        }

        $room->last_update_by_admin_id = Auth::id();
        $room->save();
        return new Response(
            true,
            Response::messageToArray('Room updated successfully'),
            $room,
        );
    }
    public function delete(int $id): Response
    {
        $room = $this->roomRepository->find($id);

        if (!$this->roomRepository->delete($room))
            return new Response(
                false,
                Response::messageToArray('Failed to delete room, please try again'),
                null,
                500
            );

        return new Response(
            true,
            null,
            null,
            204
        );
    }

}