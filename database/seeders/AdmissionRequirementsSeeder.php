<?php

namespace Database\Seeders;

use App\Models\AdmissionRequirements;
use Illuminate\Database\Seeder;

class AdmissionRequirementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdmissionRequirements::factory(20)->create();
    }
}
