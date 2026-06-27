<?php

namespace App\Repositories;

use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Models\Doctor;
use App\Repositories\Interfaces\DoctorRepositoryInterface;
use DB;

class DoctorRepository extends Repository implements DoctorRepositoryInterface
{
    private function getIncludedEntities(bool $isWithRoom, bool $isWithAdderAdmin, bool $isWithUser): array
    {
        $included = [];
        if ($isWithRoom)
            $included[] = 'room';
        if ($isWithAdderAdmin)
            $included[] = 'addedByAdmin';
        if ($isWithUser)
            $included[] = 'user';

        return $included;
    }
    public function addNewDoctor(array $doctorData): Response
    {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            Doctor::create($doctorData),
            201
        );
    }
    public function getAllDoctorsPaged(
        int $per_page = 10,
        bool $isWithRoom = false,
        bool $isWithAdderAdmin = false,
        bool $isWithUser = false,
    ): Response {
        return new Response(
            ResponseStatusEnum::SUCCESS,
            null,
            Doctor::with($this->getIncludedEntities($isWithRoom, $isWithAdderAdmin, $isWithUser))
                ->orderBy('created_at', 'desc')->paginate($per_page),
        );
    }

    public function getDoctorById(
        int $doctorId,
        bool $failIfNotExists = true,
        bool $isWithRoom = false,
        bool $isWithAdderAdmin = false,
        bool $isWithUser = false,
    ) {
        $returned = $failIfNotExists ?
            Doctor::with($this->getIncludedEntities($isWithRoom, $isWithAdderAdmin, $isWithUser))->findOrFail($doctorId) :
            Doctor::with($this->getIncludedEntities($isWithRoom, $isWithAdderAdmin, $isWithUser))->find($doctorId);
        return $returned;
    }
    public function deleteDoctor(Doctor &$doctor): Response
    {
        $user = $doctor->user;
        try {
            return DB::transaction(function () use ($doctor, $user) {
                if (!$doctor->delete() || !((new UserRepository())->deleteByObject($user)))
                    throw new \LogicException('Field to delete doctor, please try again');
                return new Response(ResponseStatusEnum::SUCCESS, null, null, 204);
            });
        } catch (\LogicException $e) {
            return new Response(
                ResponseStatusEnum::FAIL,
                Response::messageToArray($e->getMessage()),
                null,
                400
            );
        }
    }
    public function getDoctorAppointmentDuration(int $doctorId, bool $failIfDoctorNotExists = true): int
    {
        $query = Doctor::query()->where('id', $doctorId);
        return $failIfDoctorNotExists ?
            $query->valueOrFail('appointment_duration') :
            $query->value('appointment_duration');
    }

    public function getDoctorFullname(int $doctorId): string
    {
        $query = Doctor::query()
            ->join('users', 'doctors.user_id', '=', 'users.id')
            ->where('doctors.id', $doctorId)
            ->select([
                'users.first_name',
                'users.last_name',
            ])->first();

        return $query->first_name . ' ' . $query->last_name;
    }

    public function allDoctorsEmails()
    {
        return Doctor::query()
            ->join('users', 'doctors.user_id', '=', 'users.id')
            ->pluck('users.email');
    }
}
