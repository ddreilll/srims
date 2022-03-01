<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YearLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_year_level')->insert([
            [
                'year_order' => '1',
                'year_name' => '1st Year',
                'year_createdAt' => now(),
            ],
            [
                'year_order' => '2',
                'year_name' => '2nd Year',
                'year_createdAt' => now(),
            ],
            [
                'year_order' => '3',
                'year_name' => '3rd Year',
                'year_createdAt' => now(),
            ],
            [
                'year_order' => '4',
                'year_name' => '4th Year',
                'year_createdAt' => now(),
            ],
        ]);
    }
}