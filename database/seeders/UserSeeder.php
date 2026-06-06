<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'first_name' => 'Tamer',
            'last_name' => 'Ashrifa',
            'email' => 'tamrashryft@gmail.com',
            'password' => 'tamer2004',
            'phone' => '0988138665',
            'date_of_birth' => '2004-06-12',
            'gender' => true,
            'username' => 'TamerAshrifa',
            'created_at' => now(),
            'email_verified_at' => now(),
        ]);
        $user->role = UserRoleEnum::ADMIN;
        $user->save();

        User::factory(29)->create();
    }
}
