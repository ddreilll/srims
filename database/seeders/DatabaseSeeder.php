<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ScheduleInstructorSeeder::class);
        $this->call(AdmissionRequirementsSeeder::class);
        $this->call(SchoolYearSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(TermSeeder::class);
        $this->call(YearLevelSeeder::class);
    }
}