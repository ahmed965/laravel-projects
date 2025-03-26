<?php
namespace Database\Seeders;

use App\Models\TimeSlot;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TimeSlot::create([
            'doctor_id'    => 1,
            'start_time'   => '2025-03-26 09:00:00',
            'end_time'     => '2025-03-26 09:30:00',
            'is_available' => 1,
        ]);

        TimeSlot::create([
            'doctor_id'    => 2,
            'start_time'   => '2025-03-26 10:00:00',
            'end_time'     => '2025-03-26 10:30:00',
            'is_available' => 0,
        ]);
    }
}
