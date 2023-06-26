<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'              => 1,
                'key'            => 'panel.2fa',
                'value'           => 'off',
                'created_at'           => now(),
            ],
            [
                'id'              => 2,
                'key'            => 'panel.email_verified',
                'value'           => 'off',
                'created_at'           => now(),
            ],
        ];

        Configuration::insert($users);
    }
}
