<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;


class FileManagerController extends Controller
{



    /*
|--------------------------------------------------------------------------
|    Begin::Functions
|-------------------------------------------------------------------------- 
|
*/

    public function index()
    {
        return view('admin.file_manager.index', ['menu' => 'file-manager', 'title' => "File Manager", "breadcrumb" => [["name" => "File Manager"]]]);
    }



    /*
|--------------------------------------------------------------------------
|    Begin::Views
|-------------------------------------------------------------------------- 
|
*/
}
