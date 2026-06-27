<?php

namespace Database\Seeders;

use App\Models\WeekDay;
use Illuminate\Database\Seeder;

class WeekDaySeeder extends Seeder
{

    public function run(): void
    {
        $weekDays = ['Friday', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
        foreach ($weekDays as $weekday)
            WeekDay::create([
                'name' => $weekday,
            ]);
    }
}
