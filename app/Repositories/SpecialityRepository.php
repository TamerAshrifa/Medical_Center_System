<?php

namespace App\Repositories;

use App\Models\Speciality;
use App\Repositories\Interfaces\SpecialityRepositoryInterface;
use DB;

class SpecialityRepository extends Repository implements SpecialityRepositoryInterface
{
    private function getIncludedEntities(bool $withAdderAdmin, bool $withDoctors): array
    {
        $included = [];
        if ($withAdderAdmin)
            $included = array_merge($included, [
                'addedByAdmin:id,user_id',
                'addedByAdmin.user:id,first_name,last_name',
            ]);
        if ($withDoctors)
            $included = array_merge($included, [
                'doctors:id,user_id',
                'doctors.user:id,first_name,last_name',
            ]);

        return $included;
    }
    public function add(array $specialityData): Speciality
    {
        return Speciality::create($specialityData);
    }
    public function paginate(
        int $perPage = 10,
        bool $withAdderAdmin = false,
        bool $withDoctors = false
    ) {
        return Speciality::query()
            ->with($this->getIncludedEntities($withAdderAdmin, $withDoctors))
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function find(
        int $id,
        bool $withAdderAdmin = false,
        bool $withDoctors = false,
        bool $failIfNotExists = true,
    ): Speciality {
        $query = Speciality::query()
            ->with($this->getIncludedEntities($withAdderAdmin, $withDoctors));
        return $failIfNotExists ?
            $query->findOrFail($id) :
            $query->find($id);
    }

    public function delete(Speciality &$speciality): bool
    {
        return $speciality->delete() > 0;
    }

}