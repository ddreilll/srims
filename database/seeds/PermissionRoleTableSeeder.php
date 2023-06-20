<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return $permission->title == 'category_transaction' || $permission->title == 'menu_student_records' || $permission->title == 'access_student_profile' || $permission->title == 'access_student_grades';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);

    }
}
