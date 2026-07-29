<?php

namespace App\Services;

use App\DTOs\Patient\PatientDTO;
use App\DTOs\Patient\PatientDTOUpdate;
use App\Enums\UserRoleEnum;

use App\GeneralClasses\Response;
use App\Models\User;
use App\Repositories\Interfaces\PatientRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use DB;

class PatientService extends Service
{
    public function __construct(
        protected PatientRepositoryInterface $patientRepository,
        protected UserRepositoryInterface $userRepository,
    ) {
        parent::__construct();
    }

    public function paginate(): Response
    {
        $records = $this->patientRepository->paginate($this->perPage);
        return new Response(
            true,
            $this->paginationMessage($records),
            $records->items(),
        );
    }
    public function add(PatientDTO $dto): Response
    {
        $user = User::find($dto->user_id);

        $addedPatient = null;
        DB::transaction(
            function () use ($user, &$addedPatient, $dto) {
                $user->role = UserRoleEnum::PATIENT;
                $user->save();
                $addedPatient = $this->patientRepository->add($dto->toArray());
            }
        );

        return new Response(
            true,
            Response::messageToArray('Patient added successfully'),
            $addedPatient,
            201
        );
    }
    public function show(int $id): Response
    {
        return new Response(
            true,
            null,
            $this->patientRepository->findWithUser($id),
        );
    }
    public function update(PatientDTOUpdate $dto, int $id): Response
    {
        $patient = $this->patientRepository->find($id);
        $patientArray = $dto->toArray();
        $patient->fill($patientArray);
        if (!$patient->isDirty()) {
            return new Response(
                true,
                Response::messageToArray('No changes detected'),
            );
        }

        $patient->save();
        return new Response(
            true,
            Response::messageToArray('Patient updated successfully'),
            $patient,
        );
    }
    public function delete(int $id): Response
    {
        $patient = $this->patientRepository->findWithUser($id);

        $user = $patient->user;
        if ($user == null) {
            return new Response(
                false,
                Response::messageToArray('User of patient not found'),
                null,
                404
            );
        }

        try {
            if (!$this->patientRepository->delete($patient))
                throw new \LogicException('Failed to Delete patient, please try again');
        } catch (\LogicException $e) {
            return new Response(
                false,
                Response::messageToArray($e->getMessage()),
                null,
                500
            );
        }

        return new Response(true, null, null, 204);
    }
    public function search(string $searchWord): Response
    {
        return new Response(
            true,
            null,
            $this->patientRepository->search($searchWord),
        );
    }
}