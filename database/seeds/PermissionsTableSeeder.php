<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // $permissions = [
        //     [
        //         'id'         => '1',
        //         'title'      => 'permission_create',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '2',
        //         'title'      => 'permission_edit',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '3',
        //         'title'      => 'permission_show',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '4',
        //         'title'      => 'permission_delete',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '5',
        //         'title'      => 'permission_access',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '6',
        //         'title'      => 'role_create',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '7',
        //         'title'      => 'role_edit',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '8',
        //         'title'      => 'role_show',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '9',
        //         'title'      => 'role_delete',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '10',
        //         'title'      => 'role_access',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '11',
        //         'title'      => 'user_management_access',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '12',
        //         'title'      => 'user_create',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '13',
        //         'title'      => 'user_edit',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '14',
        //         'title'      => 'user_show',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '15',
        //         'title'      => 'user_delete',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        //     [
        //         'id'         => '16',
        //         'title'      => 'user_access',
        //         'created_at' => '2019-09-10 14:00:26',
        //         'updated_at' => '2019-09-10 14:00:26',
        //     ],
        // ];

        $permissions = [
            [
                'id' => '1',
                'title'      => 'category_transaction',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '2',
                'title'      => 'menu_student_request',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '3',
                'title'      => 'menu_student_records',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '4',
                'title'      => 'access_student_profile',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '5',
                'title'      => 'access_student_grades',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '6',
                'title'      => 'category_system_setup',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '7',
                'title'      => 'menu_admission_requirements',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '8',
                'title'      => 'access_requirements',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '9',
                'title'      => 'access_requirements_criteria',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '10',
                'title'      => 'menu_course_curriculum',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '11',
                'title'      => 'access_curriculum',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '12',
                'title'      => 'access_course',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '13',
                'title'      => 'access_subject',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '14',
                'title'      => 'menu_schedules',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '15',
                'title'      => 'access_schedules',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '16',
                'title'      => 'access_rooms',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '17',
                'title'      => 'access_instructors',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '18',
                'title'      => 'category_system_settings',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '19',
                'title'      => 'menu_user_accounts',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '20',
                'title'      => 'access_users',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '21',
                'title'      => 'access_user_roles',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '22',
                'title'      => 'menu_system_settings',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '23',
                'title'      => 'access_system_settings_curriculum',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
            [
                'id' => '24',
                'title'      => 'access_system_settings_student_profile',
                'created_at' => '2019-09-10 14:00:26',
                'updated_at' => '2019-09-10 14:00:26',
            ],
        ];

        Permission::insert($permissions);
    }
}
