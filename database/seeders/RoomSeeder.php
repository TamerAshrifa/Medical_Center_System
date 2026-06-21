<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Room;
class RoomSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++)
            Room::create([
                'name' => "Room $i",
                'monthly_rent' => rand(800, 2000),
                'last_update_by_admin_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
