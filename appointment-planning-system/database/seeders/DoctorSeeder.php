<?php
namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::create([
            'name'              => 'Paul',
            'specialization_id' => 1,
        ]);
        Doctor::create([
            'name'              => 'Ania',
            'specialization_id' => 2,
        ]);
    }
}
