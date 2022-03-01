<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_term')->insert([
            [
                'term_order' => '1',
                'term_name' => '1st Semester',
                'term_createdAt' => now(),
            ],
            [
                'term_order' => '2',
                'term_name' => '2nd Semester',
                'term_createdAt' => now(),
            ],
            [
                'term_order' => '3',
                'term_name' => 'Summer Semester',
                'term_createdAt' => now(),
            ],
        ]);
    }
}