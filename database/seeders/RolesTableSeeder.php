<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Systems Administrator',
            ],
            [
                'id'    => 2,
                'title' => 'Encoder',
            ],
            [
                'id'    => 3,
                'title' => 'Verifier',
            ],
        ];

        Role::insert($roles);
    }
}
