<?php

namespace App\Http\Controllers;

use App\DTOs\User\UserDTO;
use App\DTOs\User\UserDTOUpdate;
use App\Enums\UserRoleEnum;
use App\Http\Requests\UserController\StoreUserRequest;
use App\Http\Requests\UserController\UpdateUserRequest;
use App\Http\Resources\UserToAdminResource;
use App\Http\Resources\UserToDoctorResource;
use App\Http\Resources\UserToPatientResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use Illuminate\Support\Facades\Auth;

/**
 * @group User APIs
 */
class UserController extends Controller
{


    public function __construct(
        protected UserService $userService,
    ) {
    }
    private function resource(&$userOrCollectionOfIt, bool $isCollection)
    {
        switch ($this->getCurrentUserRole()) {
            case UserRoleEnum::ADMIN:
                if ($isCollection)
                    return UserToAdminResource::collection($userOrCollectionOfIt);
                return new UserToAdminResource($userOrCollectionOfIt);
            case UserRoleEnum::PATIENT:
                if ($isCollection)
                    return UserToPatientResource::collection($userOrCollectionOfIt);
                return new UserToPatientResource($userOrCollectionOfIt);
            case UserRoleEnum::DOCTOR:
                if ($isCollection)
                    return UserToDoctorResource::collection($userOrCollectionOfIt);
                return new UserToDoctorResource($userOrCollectionOfIt);
            default:
                if ($isCollection)
                    return UserToPatientResource::collection($userOrCollectionOfIt);
                return new UserToPatientResource($userOrCollectionOfIt);
        }
    }
    /**
     * Add New User
     * 
     * ###For: Web
     * Only admins are allowed to use this API. There is a middleware CheckAdmin on this API route
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        $response = $this->userService->create(UserDTO::fromRequest($request->validated()));

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, false),
        ], $response->statusCode);
    }

    /**
     * View All Users
     * 
     * ###For: Web
     * Only admins are allowed to use this API. There is a middleware CheckAdmin on this API route
     * @urlParam per_page integer required The number of rooms shown in each page. Defaults to 10. 
     */
    public function index(int $per_page): JsonResponse
    {
        $response = $this->userService->paginate($per_page);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
    }

    /**
     * View a Specified User
     * 
     * ###For: Mobile(Patient - Doctor), Web
     * Everyone in the system is allowed to use this API.
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam id integer required min:1
     */
    public function show(int $id): JsonResponse
    {
        $loggedUser = Auth::user();
        if ($loggedUser->role == null || $loggedUser->role == UserRoleEnum::PATIENT)
            if ($loggedUser->id != $id)
                return response()->json([
                    'result' => 'Fail',
                    'message' => 'Patients can\'t see other patients profiles',
                ], 403);

        $response = $this->userService->show($id);

        return response()->json([
            'result' => $response->result,
            'data' => $this->resource($response->data, false),
        ]);
    }

    /**
     * Update a User
     * 
     * ###For: Mobile(Patient - Doctor), Web
     * Everyone in the system is allowed to use this API.
     * @urlParam id integer required min:1
     */
    public function update(UpdateUserRequest $request, int $id): JsonResponse
    {
        if (Auth::id() != $id)
            return response()->json([
                'result' => 'Fail',
                'message' => 'No one can edit another user\'s information',
            ], 403);

        $response = $this->userService->update($id, UserDTOUpdate::fromRequest($request->validated()));

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, false),
        ]);
    }

    /**
     * Delete a User
     * 
     * ###For: Web
     * Only admins are allowed to use this API. There is a middleware CheckAdmin on this API route
     * @urlParam id integer required min:1
     */
    public function destroy(int $id)
    {
        $response = $this->userService->delete($id);

        if ($response->result != ResponseStatusEnum::SUCCESS) {
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);
        }

        return response()->noContent(204);
    }
}
