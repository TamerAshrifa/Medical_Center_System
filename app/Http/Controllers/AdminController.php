<?php

namespace App\Http\Controllers;

use App\Http\Resources\Admin\AdminToAdminResource;
use App\Services\AdminService;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct(
        protected AdminService $adminService,
    ) {
    }

    /**
     * Search for a admin
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * This API is to search for an admin by first_name, returns a collection of admins have similar first_name
     * @urlParam search_word string required 
     */
    public function search(string $search_word)
    {
        $response = $this->adminService->search($search_word);

        if ($response->data)
            $response->data = AdminToAdminResource::collection($response->data);
        return $this->jsonResponse($response);
    }

    /**
     * Add New admin
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     * @urlParam user_id integer required The ID of user to link new admin with 
     */
    public function store(int $user_id)
    {
        $response = $this->adminService->add(Auth::user()->admin->id, $user_id);

        if ($response->data)
            $response->data = new AdminToAdminResource($response->data);
        return $this->jsonResponse($response);
    }

    /**
     * Unactive an admin
     * 
     * ###For: Web
     * Only admins are allowed to use this API
     * @urlParam id integer required The ID number of admin to unactive
     */
    public function destroy(int $id)
    {
        $response = $this->adminService->unactive($id);

        return $this->jsonResponse($response);
    }

}
