<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemSettingsController extends Controller
{
    public function index(){
        return view('admin.system-settings', ['menu_header'=> 'Settings', 'title' => 'System Settings', 'menu' => '', 'sub_menu' => 'system-settings']);
    }
}
