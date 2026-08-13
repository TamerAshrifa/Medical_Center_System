<?php

namespace App\Services;

use App\Enums\UserRoleEnum;
use App\GeneralClasses\Response;
use App\Models\MonthlyReport;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use DB;

class AdminService extends Service
{
    public function __construct(
        protected AdminRepositoryInterface $adminRepository,
        protected UserRepositoryInterface $userRepository,
    ) {
        parent::__construct();
    }
    public function search(string $searchWord): Response
    {
        return new Response(
            true,
            null,
            $this->adminRepository->search($searchWord),
        );
    }

    public function add(int $added_by_admin_id, int $user_id): Response
    {
        $user = $this->userRepository->find($user_id);
        if ($user->role != null)
            return new Response(
                false,
                Response::messageToArray('User is already a ' . $user->role->value . ', it can\'t be modified'),
                null,
                409
            );

        $addedAdmin = null;
        DB::transaction(
            function () use ($user, &$addedAdmin, $added_by_admin_id, $user_id) {
                $user->role = UserRoleEnum::ADMIN;
                $user->save();
                $addedAdmin = $this->adminRepository->add($added_by_admin_id, $user_id);
            }
        );

        return new Response(
            true,
            Response::messageToArray('Admin added successfully'),
            $addedAdmin,
            201
        );
    }

    public function unactive(int $id): Response
    {
        $wasUnactivated = $this->adminRepository->unactive($id);
        if (!$wasUnactivated) {
            return new Response(
                false,
                Response::messageToArray('Admin wasn\'t unactivated, please try again'),
                null,
                500
            );
        }

        return new Response(
            true,
            Response::messageToArray('Admin was unactivated successfully'),
        );
    }

    public function activate(int $id): Response
    {
        $wasActivated = $this->adminRepository->activate($id);
        if (!$wasActivated) {
            return new Response(
                false,
                Response::messageToArray('Admin wasn\'t activated successfully, please try again'),
                null,
                500
            );
        }

        return new Response(
            true,
            Response::messageToArray('Admin was activated successfully'),
        );
    }

    public function createMonthlyReport(string $dateOfMonth, int $idOfRequesterAdmin): Response
    {
        $didSucceed = $this->adminRepository->monthlyReport($dateOfMonth, $idOfRequesterAdmin);

        if (!$didSucceed) {
            return new Response(
                false,
                Response::messageToArray('Monthly report generation failed, please try again'),
                null,
                500
            );
        }

        return new Response(
            true,
            Response::messageToArray('Monthly report is being generated, you will be notified when it is ready'),
        );
    }
    public function paginateMonthlyReports()
    {
        $records = MonthlyReport::query()
            ->with([
                'madeByAdmin:id,user_id',
                'madeByAdmin.user:id,first_name,last_name',
            ])
            ->orderByDesc('created_at')
            ->paginate($this->perPage);

        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items(),
        );
    }

}