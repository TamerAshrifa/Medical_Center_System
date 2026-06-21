<?php

namespace App\Repositories;

use App\DTOs\User\UserDTOUpdate;
use App\Enums\UserRoleEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\GeneralClasses\Response;
use App\Models\User;
use App\DTOs\User\UserDTO;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Storage;

class UserRepository extends Repository implements UserRepositoryInterface
{
    public function create(UserDTO $dtoUser, $email_verified_at = null): User
    {
        $userData = $dtoUser->toArray();
        $userData['email_verified_at'] = $email_verified_at;
        $userData['password'] = Hash::make($userData['password']);
        return User::create($userData);
    }
    public function findByEmailOrUsername(string $email_or_username, $failIfNotExist = true): User|null
    {
        return $failIfNotExist ?
            User::where('email', $email_or_username)
                ->orWhere('username', $email_or_username)
                ->firstOrFail() :
            User::where('email', $email_or_username)
                ->orWhere('username', $email_or_username)
                ->first();
    }
    public function findByEmail(string $email, $failIfNotExist = true): User|null
    {
        return $failIfNotExist ?
            User::where('email', $email)->firstOrFail() :
            User::where('email', $email)->first();
    }
    public function findById(int $id, $failIfNotExist = true): User|null
    {
        return $failIfNotExist ?
            User::findOrFail($id) :
            User::find($id);
    }
    public function findByIdWithRoleObject(int $id, UserRoleEnum $role, $failIfNotExists = true): User|null
    {
        return $failIfNotExists ?
            User::with($role->value)->findOrFail($id) :
            User::with($role->value)->find($id);
    }
    public function resetPassword(string $email, string $newPassword): bool
    {
        return User::where('email', $email)->update(['password' => $newPassword]) > 0;
    }
    public function deleteAllTokens(string $email): bool
    {
        return DB::transaction(fn() => $this->findByEmail($email)->tokens()->delete()) > 0;
    }

    public function deleteByObject(User $user): bool
    {
        $photo = $user->photo;
        if ($user->delete()) {
            if ($photo)
                Storage::disk('public')->delete($photo);
            return true;
        }
        return false;
    }
    public function deleteById(int $id): bool
    {
        return $this->deleteByObject($this->findById($id));
    }
    public function logout(int $id): bool
    {
        return $this->findById($id)->currentAccessToken()->delete() > 0;
    }
    public function paginate(int $per_page = 10)
    {
        return User::orderBy('created_at', 'desc')->paginate($per_page);
    }
    public function update(int $id, UserDTOUpdate $userDTO): Response
    {
        return DB::transaction(function () use ($id, $userDTO) {
            $user = $this->findById($id);

            // dd([
            //     'user' => $user,
            //     'new data' => $userDTO->toArray(),
            // ]);
            // $payload = $userDTO->toArray();
            // $current = $user->only(array_keys($payload));
            // $diff = array_diff_assoc($payload, $current);
            // dd($payload, $current, $diff);

            $user->fill($userDTO->toArray());
            if (!$user->isDirty()) {
                return new Response(
                    ResponseStatusEnum::NOTHING,
                    Response::messageToArray('No changes detected'),
                );
            }

            $user->save();

            return new Response(
                ResponseStatusEnum::SUCCESS,
                Response::messageToArray('User updated successfully'),
                $user
            );
        });
    }

}
