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

        return view('admin.settings.show', ['menu_header' => 'Settings', 'title' => "System Settings", "menu" => "system-settings", "sub_menu" => "settings-curriculum", "breadcrumb" => [["name" => "System Settings"]], 'formData_terms' => $terms]);
    }

    public function view_student_profile()
    {
        return view('admin.settings.student-profile', ['menu_header' => 'Settings', 'title' => 'System Settings', 'menu' => 'system-settings', 'sub_menu' => 'settings-student-profile', "breadcrumb" => [["name" => "System Settings"]]]);
    }
}
