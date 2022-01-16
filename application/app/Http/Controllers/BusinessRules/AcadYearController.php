<?php

namespace App\Http\Controllers\BusinessRules;


use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AcadYearController extends Controller
{



/*
|--------------------------------------------------------------------------
|    Begin::Functions
|-------------------------------------------------------------------------- 
|
*/


// -- Begin::Ajax Requests -- //

public function getAllYears(){

    try{
        $acadYears = Storage::disk('data')->exists('year.json') ? json_decode(Storage::disk('data')->get('year.json'), true) : [];

        for ($i = 0; $i < sizeof($acadYears); $i++) {
          $acadYears[$i]["year_acad"] = $acadYears[$i]['year'] . " - " . ($acadYears[$i]['year'] + 1);
        }

        return $acadYears;
    }catch(Exception $e){
        return ['error' => true, 'message' => $e->getMessage()];
    }

}

// -- End::Ajax Requests -- //


/*
|--------------------------------------------------------------------------
|    Begin::Views
|-------------------------------------------------------------------------- 
|
*/

}
