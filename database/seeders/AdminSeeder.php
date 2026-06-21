<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'user_id' => 1,
            'added_by_admin_id' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        User::where('id', 1)->update(['role' => 'admin']);
        for ($i = 2; $i <= 5; $i++) {
            Admin::create([
                'user_id' => $i,
                'added_by_admin_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            User::where('id', $i)->update(['role' => 'admin']);
        }

    }
}
