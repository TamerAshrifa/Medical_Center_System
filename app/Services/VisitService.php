<?php

namespace App\Services;

use App\DTOs\Visit\VisitDTOUpdate;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Repositories\Interfaces\VisitRepositoryInterface;

class VisitService extends Service
{
    public function __construct(
        protected VisitRepositoryInterface $visitRepositoryInterface,
    ) {
    }
    public function paginate(int $per_page = 10): Response
    {
        $visits = $this->visitRepositoryInterface->paginate($per_page);
        $items = $visits->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "result" => "Success",
                "current_page_number" => $visits->currentPage(),
                "last_page_number" => $visits->lastPage(),
                "items_per_page" => $visits->perPage(),
                "next_page_url" => $visits->nextPageUrl(),
                "previous_page_url" => $visits->previousPageUrl(),
                "first_page_url" => $visits->url(1),
                "last_page_url" => $visits->url($visits->lastPage()),
                "total_items_number" => $visits->total(),
            ],
            $items
        );
    }
    public function paginateDoctorVisits(int $per_page = 10, int $doctor_id): Response
    {
        $visits = $this->visitRepositoryInterface->paginateDoctorVisits($per_page, $doctor_id);
        $items = $visits->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "result" => "Success",
                "current_page_number" => $visits->currentPage(),
                "last_page_number" => $visits->lastPage(),
                "items_per_page" => $visits->perPage(),
                "next_page_url" => $visits->nextPageUrl(),
                "previous_page_url" => $visits->previousPageUrl(),
                "first_page_url" => $visits->url(1),
                "last_page_url" => $visits->url($visits->lastPage()),
                "total_items_number" => $visits->total(),
            ],
            $items
        );
    }
    public function paginatePatientVisits(int $per_page = 10, int $patient_id): Response
    {
        $visits = $this->visitRepositoryInterface->paginatePatientVisits($per_page, $patient_id);
        $items = $visits->items();
        return new Response(
            ResponseStatusEnum::SUCCESS,
            [
                "result" => "Success",
                "current_page_number" => $visits->currentPage(),
                "last_page_number" => $visits->lastPage(),
                "items_per_page" => $visits->perPage(),
                "next_page_url" => $visits->nextPageUrl(),
                "previous_page_url" => $visits->previousPageUrl(),
                "first_page_url" => $visits->url(1),
                "last_page_url" => $visits->url($visits->lastPage()),
                "total_items_number" => $visits->total(),
            ],
            $items
        );
    }
    public function find($failIfNotExists, bool $withAppointment, int $id): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            $this->visitRepositoryInterface->find($failIfNotExists, $withAppointment, $id)
        );
    }
    public function update(VisitDTOUpdate $dto, int $id): Response
    {
        $didUpdate = $this->visitRepositoryInterface->update($dto, $id);
        if (!$didUpdate)
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray('Visit wasn\'t updated, please try again'),
            );
        return new Response(
            ResponseStatusEnum::SUCCESS,
            Response::messageToArray('Visit updated successfully'),
        );
    }
}
