<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_school_year')->insert([
            [
                'syear_year' => '1998',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '1999',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2000',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2001',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2002',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2003',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2004',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2005',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2006',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2007',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2008',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2009',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2010',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2011',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2012',
                'syear_createdAt' => now(),
            ],
            [
                'syear_year' => '2013',
                'syear_createdAt' => now(),
            ],
        ]);
    }
}