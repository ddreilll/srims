<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $encoder_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' 
            && substr($permission->title, 0, 5) != 'role_' 
            && substr($permission->title, 0, 11) != 'permission_' 
            && substr($permission->title, 0, 9) != 'document_'
            && substr($permission->title, 0, 7) != 'course_'
            && substr($permission->title, 0, 6) != 'honor_'
            && substr($permission->title, 0, 11) != 'year_level_'
            && substr($permission->title, 0, 9) != 'semester_'
            && substr($permission->title, 0, 12) != 'school_year_';
        });
        Role::findOrFail(2)->permissions()->sync($encoder_permissions);
    }
}
