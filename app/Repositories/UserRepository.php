<?php

namespace App\Repositories;

use App\DTOs\User\UserDTOUpdate;
use App\Models\User;
use App\DTOs\User\UserDTO;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Storage;

class UserRepository extends Repository implements UserRepositoryInterface
{
    public function create(UserDTO $dto, $emailVerifiedAt = null): User
    {
        $userData = $dto->toArray();
        $userData['email_verified_at'] = $emailVerifiedAt;
        $userData['password'] = Hash::make($userData['password']);
        return User::create($userData);
    }
    public function findByEmailOrUsername(string $emailOrUsername, $failIfNotExist = true): User|null
    {
        return $failIfNotExist ?
            User::where('email', $emailOrUsername)
                ->orWhere('username', $emailOrUsername)
                ->firstOrFail() :
            User::where('email', $emailOrUsername)
                ->orWhere('username', $emailOrUsername)
                ->first();
    }
    public function findByEmail(string $email, $failIfNotExist = true): User|null
    {
        return $failIfNotExist ?
            User::where('email', $email)->firstOrFail() :
            User::where('email', $email)->first();
    }
    public function find(int $id, $failIfNotExist = true): User|null
    {
        return $failIfNotExist ?
            User::findOrFail($id) :
            User::find($id);
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
    public function delete(int $id): bool
    {
        return $this->deleteByObject($this->find($id));
    }
    public function logout(int $id): bool
    {
        return $this->find($id)->currentAccessToken()->delete() > 0;
    }
    public function paginate(int $perPage = 10)
    {
        return User::orderBy('created_at', 'desc')->paginate($perPage);
    }
    public function update(int $id, UserDTOUpdate $dto): bool
    {
        $user = $this->find($id);
        $user->fill($dto->toArray());

        if (!$user->isDirty())
            return true;

        return $user->save();
    }
    public function searchForNonRoledUser(string $searchWord)
    {
        return User::query()
            ->where('role', null)
            ->where('first_name', 'LIKE', "%$searchWord%")
            ->get();
    }
}
