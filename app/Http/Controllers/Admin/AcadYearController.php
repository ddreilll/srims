<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\SchoolYear;

class AcadYearController extends Controller
{



    /*
|--------------------------------------------------------------------------
|    Begin::Functions
|-------------------------------------------------------------------------- 
|
*/


    // -- Begin::Ajax Requests -- //

    public function getAllYears($filter = null)
    {
        return (new SchoolYear)->fetchAll($filter);
    }

    // -- End::Ajax Requests -- //


    /*
|--------------------------------------------------------------------------
|    Begin::Views
|-------------------------------------------------------------------------- 
|
*/
}