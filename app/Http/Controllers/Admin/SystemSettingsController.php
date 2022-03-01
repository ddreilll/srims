<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Controllers
use App\Http\Controllers\Admin\TermController as Terms;

class SystemSettingsController extends Controller
{
    public function view_curriculum()
    {

        $terms = (new Terms)->getAllTerm([]);

        return view('admin.system-settings', ['menu_header' => 'Settings', 'title' => 'System Settings', 'menu' => '', 'sub_menu' => 'system-settings', 'formData_terms' => $terms]);
    }

    public function view_student_profile()
    {
        return view('admin.settings-student-profile', ['menu_header' => 'Settings', 'title' => 'System Settings ― Student Profile', 'menu' => 'system-settings', 'sub_menu' => 'settings-student-profile']);
    }
}
