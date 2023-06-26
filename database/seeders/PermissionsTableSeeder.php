<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'title' => 'user_management_access',
            ],
            [
                'title' => 'permission_access',
            ],
            [
                'title' => 'role_create',
            ],
            [
                'title' => 'role_edit',
            ],
            [
                'title' => 'role_show',
            ],
            [
                'title' => 'role_delete',
            ],
            [
                'title' => 'role_access',
            ],
            [
                'title' => 'user_create',
            ],
            [
                'title' => 'user_edit',
            ],
            [
                'title' => 'user_show',
            ],
            [
                'title' => 'user_delete',
            ],
            [
                'title' => 'user_access',
            ],
            [
                'title' => 'user_alert_create',
            ],
            [
                'title' => 'user_alert_show',
            ],
            [
                'title' => 'user_alert_delete',
            ],
            [
                'title' => 'user_alert_access',
            ],
            [
                'title' => 'course_create',
            ],
            [
                'title' => 'course_edit',
            ],
            [
                'title' => 'course_show',
            ],
            [
                'title' => 'course_delete',
            ],
            [
                'title' => 'course_access',
            ],
            [
                'title' => 'document_create',
            ],
            [
                'title' => 'document_edit',
            ],
            [
                'title' => 'document_show',
            ],
            [
                'title' => 'document_delete',
            ],
            [
                'title' => 'document_access',
            ],
            [
                'title' => 'gradesheet_create',
            ],
            [
                'title' => 'gradesheet_edit',
            ],
            [
                'title' => 'gradesheet_show',
            ],
            [
                'title' => 'gradesheet_delete',
            ],
            [
                'title' => 'gradesheet_access',
            ],
            [
                'title' => 'gradesheet_encode',
            ],
            [
                'title' => 'instructor_create',
            ],
            [
                'title' => 'instructor_edit',
            ],
            [
                'title' => 'instructor_show',
            ],
            [
                'title' => 'instructor_delete',
            ],
            [
                'title' => 'instructor_access',
            ],
            [
                'title' => 'room_create',
            ],
            [
                'title' => 'room_edit',
            ],
            [
                'title' => 'room_show',
            ],
            [
                'title' => 'room_delete',
            ],
            [
                'title' => 'room_access',
            ],
            [
                'title' => 'school_year_create',
            ],
            [
                'title' => 'school_year_edit',
            ],
            [
                'title' => 'school_year_show',
            ],
            [
                'title' => 'school_year_delete',
            ],
            [
                'title' => 'school_year_access',
            ],
            [
                'title' => 'semester_create',
            ],
            [
                'title' => 'semester_edit',
            ],
            [
                'title' => 'semester_show',
            ],
            [
                'title' => 'semester_delete',
            ],
            [
                'title' => 'semester_access',
            ],
            [
                'title' => 'student_create',
            ],
            [
                'title' => 'student_edit',
            ],
            [
                'title' => 'student_show',
            ],
            [
                'title' => 'student_delete',
            ],
            [
                'title' => 'student_access',
            ],
            [
                'title' => 'subject_create',
            ],
            [
                'title' => 'subject_edit',
            ],
            [
                'title' => 'subject_show',
            ],
            [
                'title' => 'subject_delete',
            ],
            [
                'title' => 'subject_access',
            ],
            [
                'title' => 'student_honor_create',
            ],
            [
                'title' => 'student_honor_edit',
            ],
            [
                'title' => 'student_honor_show',
            ],
            [
                'title' => 'student_honor_delete',
            ],
            [
                'title' => 'student_honor_access',
            ],
            [
                'title' => 'profile_password_edit',
            ],
            [
                'title' => 'config_access',
            ],
            [
                'title' => 'config_2fa_update',
            ],
            [
                'title' => 'config_email_verified_update',
            ],
        ];

        Permission::insert($permissions);
    }
}
