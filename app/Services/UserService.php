<?php

namespace App\Services;

use App\DTOs\User\UserDTO;
use App\DTOs\User\UserDTOUpdate;

use App\GeneralClasses\Response;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService extends Service
{
    public function __construct(
        protected UserRepositoryInterface $userRepository,
    ) {
    }

    public function paginate(int $perPage = 10): Response
    {
        $records = $this->userRepository->paginate($perPage);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items()
        );
    }
    public function create(UserDTO $dto): Response
    {
        return new Response(
            true,
            Response::messageToArray('User added successfully'),
            $this->userRepository->create($dto, now()),
            201
        );
    }
    public function show(int $id): Response
    {
        return new Response(
            true,
            null,
            $this->userRepository->find($id)
        );
    }
    public function update(int $id, UserDTOUpdate $userDTO): Response
    {
        if (!$this->userRepository->update($id, $userDTO))
            return new Response(
                true,
                Response::messageToArray('Failed to updated user, please try again'),
            );
        return new Response(
            true,
            Response::messageToArray('User updated successfully'),
        );
    }
    public function delete(int $id): Response
    {
        return $this->userRepository->delete($id) ?
            new Response(true, null, null, 204) :
            new Response(
                false,
                Response::messageToArray('Failed to delete user, please try again'),
                null,
                500
            );
    }
    public function searchForNonRoledUser(string $searchWord): Response
    {
        return new Response(
            true,
            null,
            $this->userRepository->searchForNonRoledUser($searchWord),
        );
    }
}