<?php

namespace App\Repositories;

use App\Enums\UserRoleEnum;
use App\Models\Doctor;
use App\Repositories\Interfaces\DoctorRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use DB;

class DoctorRepository extends Repository implements DoctorRepositoryInterface
{
    public function __construct(
        protected UserRepositoryInterface $userRepository,
    ) {
    }


    private function includedEntities(bool $withRoom, bool $withAdderAdmin, bool $withUser): array
    {
        $included = [];
        if ($withRoom)
            $included[] = 'room:id,name';
        if ($withAdderAdmin)
            $included = array_merge($included, [
                'addedByAdmin:id,user_id',
                'addedByAdmin.user:id,first_name,last_name',
            ]);
        if ($withUser)
            $included[] = 'user:id,first_name,last_name';

        return $included;
    }
    public function add(array $doctorData): Doctor
    {
        return Doctor::create($doctorData);
    }
    public function paginate(
        int $perPage = 10,
        bool $withUnactive = true,
        bool $withRoom = false,
        bool $withAdderAdmin = false,
        bool $withUser = false,
    ) {
        return Doctor::query()
            ->with($this->includedEntities($withRoom, $withAdderAdmin, $withUser))
            ->when(!$withUnactive, fn($q) => $q->where('is_active', false))
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function find(
        int $doctorId,
        bool $failIfNotExists = true,
        bool $withRoom = false,
        bool $withAdderAdmin = false,
        bool $withUser = false,
    ): Doctor {
        $query = Doctor::query()
            ->with($this->includedEntities($withRoom, $withAdderAdmin, $withUser));
        return $failIfNotExists ?
            $query->findOrFail($doctorId) :
            $query->find($doctorId);
    }
    public function delete(Doctor &$doctor): bool
    {
        $user = $doctor->user;
        try {
            return DB::transaction(function () use ($doctor, $user) {
                if (!$doctor->delete() || !($this->userRepository->deleteByObject($user)))
                    throw new \LogicException();
                return true;
            });
        } catch (\LogicException $e) {
            return false;
        }
    }

    public function fullname(int $id): string
    {
        $query = Doctor::query()
            ->join('users', 'doctors.user_id', '=', 'users.id')
            ->where('doctors.id', $id)
            ->select([
                'users.first_name',
                'users.last_name',
            ])->first();

        return $query->first_name . ' ' . $query->last_name;
    }

    public function allDoctorsEmails()
    {
        return Doctor::query()
            ->where('is_active', true)
            ->join('users', 'doctors.user_id', '=', 'users.id')
            ->pluck('users.email');
    }

    public function search(string $searchWord, bool $isSearcherAdmin)
    {
        return Doctor::query()
            ->with('user:id,first_name,last_name')
            ->whereHas('user', function ($q) use ($searchWord) {
                $q->where('role', UserRoleEnum::DOCTOR->value)
                    ->where('first_name', 'like', "%$searchWord%");
            })
            ->when(!$isSearcherAdmin, fn($q) => $q->where('is_active', true))
            ->get();
    }

    public function deactivate(int $id): bool
    {
        return Doctor::where('id', $id)->update([
            'is_active' => false,
            'room_id' => null,
        ]) > 0;
    }
    public function activate(int $id, bool $roomId): bool
    {
        return Doctor::where('id', $id)->update([
            'is_active' => true,
            'room_id' => $roomId,
        ]) > 0;
    }

}
