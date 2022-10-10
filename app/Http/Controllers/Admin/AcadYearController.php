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
        $data = SchoolYear::where($filter)
            ->selectRaw('s_school_year.*, md5(syear_id) as syear_id_md5')
            ->get();

        return $data;
    }

    public function ajax_select2_base_search(Request $request)
    {
        $term = trim($request->term);
        $schoolYr = SchoolYear::select(
            DB::raw('syear_year as id'),
            DB::raw('syear_year as text'),
        )->where('syear_year', 'LIKE',  '%' . $term . '%')
        ->orderBy('syear_year', 'desc')
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

    public function ajax_select2_plus_search(Request $request)
    {
        $term = trim($request->term);
        $schoolYr = SchoolYear::select(
            DB::raw('syear_year as id'),
            DB::raw('CONCAT(syear_year," - ",syear_year + 1) as text'),
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

    // -- End::Ajax Requests -- //


    /*
|--------------------------------------------------------------------------
|    Begin::Views
|-------------------------------------------------------------------------- 
|
*/
}
