<?php

namespace App\Services;

use App\DTOs\Doctor\DoctorDTO;
use App\DTOs\Doctor\DoctorDTOUpdate;
use App\Enums\UserRoleEnum;
use App\GeneralClasses\Response;
use App\Models\Doctor;
use App\Models\Room;
use App\Repositories\Interfaces\DoctorRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use DB;

class DoctorService extends Service
{
    public function __construct(
        protected DoctorRepositoryInterface $doctorRepository,
        protected UserRepositoryInterface $userRepository
    ) {
        parent::__construct();
    }

    private function fillIncludedEntities(bool &$withRoom, bool &$withAdderAdmin, UserRoleEnum $currentUserRole): void
    {
        switch ($currentUserRole) {
            case UserRoleEnum::ADMIN:
                $withRoom = $withAdderAdmin = true;
                break;
            case UserRoleEnum::PATIENT:
                $withRoom = $withAdderAdmin = false;
                break;
            case UserRoleEnum::DOCTOR:
                $withRoom = true;
                $withAdderAdmin = false;
                break;
        }
    }
    public function paginate(bool $withUnactive = false, UserRoleEnum $currentUserRole): Response
    {
        $isWithRoom = $isWithAdderAdmin = false;
        $this->fillIncludedEntities($isWithRoom, $isWithAdderAdmin, $currentUserRole);
        $records = $this->doctorRepository->paginate(
            $this->perPage,
            $withUnactive,
            $isWithRoom,
            $isWithAdderAdmin
        );

        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items(),
        );
    }
    public function add(DoctorDTO $dto): Response
    {
        $user = $this->userRepository->find($dto->user_id);
        if ($user->role != null)
            return new Response(
                false,
                Response::messageToArray('User is already a ' . $user->role->value . ', it can\'t be modified'),
                null,
                409
            );

        $addedDoctor = null;
        DB::transaction(
            function () use ($user, &$addedDoctor, $dto) {
                $user->role = UserRoleEnum::DOCTOR;
                $user->save();
                $addedDoctor = $this->doctorRepository->add($dto->toArray());
            }
        );

        return new Response(
            true,
            Response::messageToArray('Doctor added successfully'),
            $addedDoctor,
            201
        );
    }
    public function show(int $id, UserRoleEnum $currentUserRole): Response
    {
        $isWithRoom = $isWithAdderAdmin = false;
        $this->fillIncludedEntities($isWithRoom, $isWithAdderAdmin, $currentUserRole);

        $doctor = $this->doctorRepository->find($id, true, $isWithRoom, $isWithAdderAdmin);

        return new Response(
            true,
            null,
            $doctor,
        );
    }
    public function update(DoctorDTOUpdate $dto, int $id): Response
    {
        $doctor = $this->doctorRepository->find($id);

        $doctorArray = $dto->toArray();

        $doctor->fill($doctorArray);
        if (!$doctor->isDirty()) {
            return new Response(
                true,
                Response::messageToArray('No changes detected'),
            );
        }

        $doctor->save();

        return new Response(
            true,
            Response::messageToArray('Doctor updated successfully'),
            $doctor,
        );
    }
    public function delete(int $id): Response
    {
        $doctor = $this->doctorRepository->find($id);

        if (!$this->doctorRepository->delete($doctor))
            return new Response(
                false,
                Response::messageToArray('Failed to delete the doctor, please try again'),
                null,
                500
            );

        return new Response(true, null, null, 204);
    }
    public function search(string $searchWord, bool $isSearcherAdmin): Response
    {
        return new Response(
            true,
            null,
            $this->doctorRepository->search($searchWord, $isSearcherAdmin),
        );
    }

    public function deactivate(int $id): Response
    {
        return $this->doctorRepository->deactivate($id) ?
            new Response(
                true,
                Response::messageToArray('Doctor deactivated successfully'),
            ) :
            new Response(
                false,
                Response::messageToArray('Failed to deactivate the doctor, please try again'),
                null,
                500
            );
    }
    public function activate(int $id, $roomId): Response
    {
        if (!Room::findOrFail($roomId)->doctor)
            new Response(
                false,
                Response::messageToArray('Sorry, the room is already occupied by another doctor, please select another room'),
                null,
                409
            );

        return $this->doctorRepository->activate($id, $roomId) ?
            new Response(
                true,
                Response::messageToArray('Doctor activated successfully'),
            ) :
            new Response(
                false,
                Response::messageToArray('Failed to activate the doctor, please try again'),
                null,
                500
            );
    }

}