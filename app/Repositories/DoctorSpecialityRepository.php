<?php

namespace App\Repositories;

use App\DTOs\User\DoctorSpecialityDTO;
use App\DTOs\User\DoctorSpecialityDTOUpdate;
use App\Models\DoctorSpeciality;
use App\Repositories\Interfaces\DoctorSpecialityRepositoryInterface;

class DoctorSpecialityRepository extends Repository implements DoctorSpecialityRepositoryInterface
{
    public function find(
        int $id,
        $failIfNotExists = true,
        $withDoctor = false,
        $withSpeciality = false
    ): DoctorSpeciality|null {
        $entities = [];
        if ($withDoctor)
            $entities = array_merge($entities, [
                'doctor:id,user_id',
                'doctor.user:id,first_name,last_name',
            ]);
        if ($withSpeciality)
            $entities[] = 'speciality:id,name';

        return $failIfNotExists ?
            DoctorSpeciality::with($entities)->findOrFail($id) :
            DoctorSpeciality::with($entities)->find($id);
    }
    public function paginate(int $perPage = 10)
    {
        return DoctorSpeciality::query()
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
    public function create(DoctorSpecialityDTO $dto): DoctorSpeciality
    {
        return DoctorSpeciality::create($dto->toArray());
    }
    public function update(DoctorSpecialityDTOUpdate $dto, int $id): bool
    {
        $record = $this->find($id);

        $record->fill($dto->toArray());
        if (!$record->isDirty())
            return true;

        return $record->save();
    }
    public function delete(int $id): bool
    {
        return $this->find($id)->delete() > 0;
    }
    public function exists(
        int $doctorId,
        int $specialityId,
    ): bool {
        return DoctorSpeciality::where('doctor_id', $doctorId)
            ->where('speciality_id', $specialityId)
            ->exists();
    }

    public function allForDoctor(int $doctorId)
    {
        return DoctorSpeciality::query()
            ->with('speciality:id,name')
            ->where('doctor_id', $doctorId)
            ->get();
    }
    public function allForSpeciality(int $specialityId)
    {
        return DoctorSpeciality::query()
            ->with([
                'doctor:id,user_id',
                'doctor.user:id,first_name,last_name',
            ])
            ->where('speciality_id', $specialityId)
            ->get();
    }
}
