<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_course')->insert([
            [
                'cour_code' => "BBTEBTLE",
                'cour_name' => "Bachelor in Business Teacher Education major in Business Teacher and Livelihood Education",
                "cour_createdAt" => now()
            ],
            [
                'cour_code' => "BBTEITE",
                'cour_name' => "Bachelor in Business Teacher Education major in Information Technology Education",
                "cour_createdAt" => now()
            ],
            [
                'cour_code' => "BSBAHRM",
                'cour_name' => "Bachelor of Science in Business Administration major in Human Resource Management",
                "cour_createdAt" => now()
            ],
            [
                'cour_code' => "BSBAMM",
                'cour_name' => "Bachelor of Science in Business Administration major in Marketing Management",
                "cour_createdAt" => now()
            ],
            [
                'cour_code' => "BSENTREP",
                'cour_name' => "Bachelor of Science in Entrepreneurship",
                "cour_createdAt" => now()
            ],
            [
                'cour_code' => "BSIT",
                'cour_name' => "Bachelor of Science in Information Technology",
                "cour_createdAt" => now()
            ],
            [
                'cour_code' => "DOMT",
                'cour_name' => "Diploma in Office Management Technology",
                "cour_createdAt" => now()
            ],
            [
                'cour_code' => "DOMTMOM",
                'cour_name' => "Diploma in Office Management Technology with specialization in Medical Office Management",
                "cour_createdAt" => now()
            ],
            [
                'cour_code' => "DICT",
                'cour_name' => "Diploma in Information Communication Technology",
                "cour_createdAt" => now()
            ],
        ]);
    }
}
