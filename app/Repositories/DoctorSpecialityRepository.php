<?php

namespace App\Repositories;

use App\DTOs\User\DoctorSpecialityDTO;
use App\DTOs\User\DoctorSpecialityDTOUpdate;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Models\DoctorSpeciality;
use App\Repositories\Interfaces\DoctorSpecialityRepositoryInterface;
use Illuminate\Support\Facades\DB;

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
            $entities[] = 'doctor';
        if ($withSpeciality)
            $entities[] = 'speciality';

        return $failIfNotExists ?
            DoctorSpeciality::with($entities)->findOrFail($id) :
            DoctorSpeciality::with($entities)->find($id);
    }
    public function paginate(int $per_page = 10)
    {
        return DoctorSpeciality::orderBy('created_at', 'desc')->paginate($per_page);
    }
    public function create(DoctorSpecialityDTO $dtoData): DoctorSpeciality
    {
        return DoctorSpeciality::create($dtoData->toArray());
    }
    public function update(DoctorSpecialityDTOUpdate $dtoData, int $id): Response
    {
        return DB::transaction(function () use ($dtoData, $id) {
            $record = $this->find($id);

            $record->fill($dtoData->toArray());
            if (!$record->isDirty()) {
                return new Response(
                    ResponseStatusEnum::NOTHING,
                    Response::messageToArray('No changes detected'),
                );
            }

            $record->save();

            return new Response(
                ResponseStatusEnum::SUCCESS,
                Response::messageToArray('Updated successfully'),
                $record
            );
        });
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
        return DoctorSpeciality::with('speciality')->where('doctor_id', $doctorId)->get();
    }
    public function allForSpeciality(int $specialityId)
    {
        return DoctorSpeciality::with('doctor')->where('speciality_id', $specialityId)->get();
    }
}
