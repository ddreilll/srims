<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Model
use App\YearLevel;

class YearLevelController extends Controller
{
    
    /*
|--------------------------------------------------------------------------
|    Begin::Functions
|-------------------------------------------------------------------------- 
|
*/


public function createYearLevel($data)
{
    (new YearLevel)->insertOne($data);
}

// -- Begin::Ajax Requests -- //

public function ajax_insert(Request $request)
{

    $request->validate([
        'name' => 'required|max:255'
    ]);


    $this->createYearLevel($request);

    header('Content-Type: application/json');
    echo json_encode([
        'status' => "200",
        'message' => __('modal.added_success', ['attribute' => 'Year Level'])
    ]);
}

// -- End::Ajax Requests -- //


 /*
|--------------------------------------------------------------------------
|    End::Functions
|-------------------------------------------------------------------------- 
|
*/
}
