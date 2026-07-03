<?php

namespace App\Repositories;

use App\Enums\UserRoleEnum;
use App\Models\Patient;
use App\Models\User;
use App\Repositories\Interfaces\PatientRepositoryInterface;
use DB;

class PatientRepository extends Repository implements PatientRepositoryInterface
{
    public function add(array $patientData): Patient
    {
        return Patient::create($patientData);
    }
    public function paginate(int $perPage = 10)
    {
        return Patient::query()
            ->with([
                'user:id,first_name,last_name',
                'bloodType:id,name'
            ])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
    public function findWithUser(int $id, bool $failIfNotExists = true): Patient
    {
        $query = Patient::query()
            ->with('user:id,first_name,last_name');
        return $failIfNotExists ?
            $query->findOrFail($id) :
            $query->find($id);
    }
    public function find(int $id, bool $failIfNotExists = true): Patient
    {
        return $failIfNotExists ?
            Patient::findOrFail($id) :
            Patient::find($id);
    }
    public function delete(Patient $patient): bool
    {
        $user = $patient->user;
        try {
            return DB::transaction(function () use ($patient, $user) {
                if (!$patient->delete() || !((new UserRepository())->deleteByObject($user)))
                    throw new \LogicException();
                return true;
            });
        } catch (\LogicException $e) {
            return false;
        }
    }

    public function search(string $searchWord)
    {
        return Patient::query()
            ->with('user:id,first_name,last_name')
            ->whereHas('user', function ($q) use ($searchWord) {
                $q->where('role', UserRoleEnum::PATIENT->value)
                    ->where('first_name', 'LIKE', "%$searchWord%");
            })
            ->get();
    }


}