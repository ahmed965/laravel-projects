<?php
namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specialization::create([
            'name' => 'Orthopedics',
        ]);

        Specialization::create([
            'name' => 'Cardiology',
        ]);
    }
}
