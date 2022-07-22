<?php

namespace App\Http\Controllers\Admin;

use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//Model
use App\Http\Controllers\Controller;

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

    public function ajax_select2_search(Request $request)
    {

        if ($request->ajax()) {

            $term = trim($request->term);
            $schoolYr = SchoolYear::select(
                DB::raw('syear_year as id'),
                DB::raw('CONCAT(syear_year,"-",syear_year + 1) as text'),
            )->where('syear_year', 'LIKE',  '%' . $term . '%')
                ->simplePaginate(10);

            $morePages = true;

            if (empty($schoolYr->nextPageUrl())) {
                $morePages = false;
            }

            $results = array(
                "results" => $schoolYr->items(),
                "pagination" => array(
                    "more" => $morePages
                )
            );

            return response()->json($results);
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
