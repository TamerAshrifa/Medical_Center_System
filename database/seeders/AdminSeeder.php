<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'user_id' => 1,
            'added_by_admin_id' => null,
        ]);
        User::where('id', 1)->update(['role' => 'admin']);

        for ($i = 2; $i <= 5; $i++) {
            Admin::create([
                'user_id' => $i,
                'added_by_admin_id' => 1,
            ]);
            User::where('id', $i)->update(['role' => 'admin']);
        }

    }
}
