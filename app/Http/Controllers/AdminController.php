<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\AdminController\MonthlyReportRequest;
use App\Http\Resources\Admin\AdminToAdminResource;
use App\Http\Resources\MonthlyReport\MonthlyReportToAdmin;
use App\Services\AdminService;
use Illuminate\Support\Facades\Auth;

/**
 * @group Admin APIs
 */
class AdminController extends Controller
{
    public function __construct(
        protected AdminService $adminService,
    ) {
    }

    private function monthlyReportResource(&$recordOrCollection, bool $isCollection)
    {
        switch ($this->currentUserRole()) {
            case UserRoleEnum::ADMIN:
                if ($isCollection)
                    return MonthlyReportToAdmin::collection($recordOrCollection);
                return new MonthlyReportToAdmin($recordOrCollection);
        }
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

    /**
     * Activate an admin
     * 
     * ###For: Web
     * Only admins are allowed to use this API
     * @urlParam id integer required The ID number of admin to activate
     */
    public function activate(int $id)
    {
        $response = $this->adminService->activate($id);

        return $this->jsonResponse($response);
    }

    /**
     * Request a monthly report of the medical center
     * 
     * ###For: Web
     * Only admins are allowed to use this API. 
     * date_of_month is the date of the month for which to generate the report
     */
    public function requestMonthlyReport(MonthlyReportRequest $request)
    {
        $response = $this->adminService->createMonthlyReport(
            $request->validated()['date_of_month'],
            Auth::user()->admin->id
        );
        return $this->jsonResponse($response);
    }

    /**
     * Paginate monthly reports of the medical center
     * 
     * ###For: Web
     * Only admins are allowed to use this API.
     */
    public function paginateMonthlyReports()
    {
        $response = $this->adminService->paginateMonthlyReports();
        if ($response->data)
            $response->data = $this->monthlyReportResource($response->data, true);
        return $this->jsonResponse($response);
    }
}
