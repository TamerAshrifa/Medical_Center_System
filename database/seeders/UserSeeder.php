<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Carbon\Carbon;
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
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user->role = UserRoleEnum::ADMIN;
        $user->save();

        $user = User::create([
            'first_name' => 'Hamza',
            'last_name' => 'Ashrifa',
            'email' => 'tamrashryft2@gmail.com',
            'password' => 'Hamza2005',
            'phone' => '0999999999',
            'date_of_birth' => '2005-08-30',
            'gender' => true,
            'username' => 'HamzaAshrifa',
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user->role = UserRoleEnum::DOCTOR;
        $user->save();

        $user = User::create([
            'first_name' => 'Mokdad',
            'last_name' => 'Ashrifa',
            'email' => 'tamershrefachat2@gmail.com',
            'password' => 'Mokdad2010',
            'phone' => '0888888888',
            'date_of_birth' => '2010-06-25',
            'gender' => true,
            'username' => 'MokdadAshrifa',
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user->role = UserRoleEnum::PATIENT;
        $user->save();



        User::factory(27)->create();
    }
}
