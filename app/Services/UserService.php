<?php

namespace App\Services;

use App\DTOs\User\UserDTO;
use App\DTOs\User\UserDTOUpdate;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService extends Service
{
    public function __construct(
        protected UserRepositoryInterface $userRepository,
    ) {
    }

    public function paginate(int $per_page = 10): Response
    {
        $users = $this->userRepository->paginate($per_page);
        $items = $users->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "result" => "Success",
                "current_page_number" => $users->currentPage(),
                "last_page_number" => $users->lastPage(),
                "users_per_page" => $users->perPage(),
                "next_page_url" => $users->nextPageUrl(),
                "previous_page_url" => $users->previousPageUrl(),
                "first_page_url" => $users->url(1),
                "last_page_url" => $users->url($users->lastPage()),
                "total_users_number" => $users->total(),
            ],
            $items
        );
    }
    public function create(UserDTO $userDTO): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('User added successfully'),
            $this->userRepository->create($userDTO, now()),
            201
        );
    }
    public function show(int $userId): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->userRepository->findById($userId)
        );
    }
    public function update(int $userId, UserDTOUpdate $userDTO): Response
    {
        $response = $this->userRepository->update($userId, $userDTO);

        if ($response->result != ResponseStatusEnum::SUCCESS)
            return $response;

        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('User updated successfully'),
            $response->data
        );
    }
    public function delete(int $userId): Response
    {
        return $this->userRepository->deleteById($userId) ?
            new Response(ResponseStatusEnum::SUCCESS, null, null, 204) :
            new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Failed to delete user, please try again'),
                null,
                500
            );
    }

}