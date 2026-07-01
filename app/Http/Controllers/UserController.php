<?php

namespace App\Http\Controllers;

use App\DTOs\User\UserDTO;
use App\DTOs\User\UserDTOUpdate;
use App\Enums\UserRoleEnum;
use App\Http\Requests\UserController\StoreUserRequest;
use App\Http\Requests\UserController\UpdateUserRequest;
use App\Http\Resources\User\UserToAdminResource;
use App\Http\Resources\User\UserToDoctorResource;
use App\Http\Resources\User\UserToPatientResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Storage;

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
        switch ($this->currentUserRole()) {
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
        $userData = $request->validated();
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('user_photos', 'public');
            $userData['photo'] = $path;
        }
        $response = $this->userService->create(UserDTO::fromRequest($userData));

        if (!$response->did_succeed) {
            if (isset($userData['photo']))
                Storage::disk('public')->delete($userData['photo']);

            return $this->jsonResponse($response);
        }

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
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

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
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
                    'did_succeed' => false,
                    'message' => 'Patients can\'t see other patients profiles',
                ], 403);

        $response = $this->userService->show($id);

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
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
                'did_succeed' => false,
                'message' => 'No one can edit another user\'s information',
            ], 403);

        $userData = $request->validated();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('user_photos', 'public');
            $userData['photo'] = $path;
        }
        $response = $this->userService->update($id, UserDTOUpdate::fromRequest($userData));

        if (!$response->did_succeed)
            if (isset($userData['photo']))
                Storage::disk('public')->delete($userData['photo']);

        if ($response->data)
            $response->data = $this->resource($response->data, false);
        return $this->jsonResponse($response);
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

        if (!$response->did_succeed)
            return $this->jsonResponse($response);

        return response()->noContent(204);
    }

    /**
     * Search for a non-roled user
     * ###For: Web
     * Only admins are allowed to use this API.
     * This API is to search for a non-roled user by first_name, returns a collection of non-roled users have similar first_name; This API is used when adding a (Patient - Doctor - Admin) to link them with a specified non-roled user
     * @urlParam search_word string required 
     */
    public function searchForNonRoledUser(string $search_word)
    {
        $response = $this->userService->searchForNonRoledUser($search_word);

        if ($response->data)
            $response->data = $this->resource($response->data, true);
        return $this->jsonResponse($response);
    }
}
