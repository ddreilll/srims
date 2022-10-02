<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//Model
use App\Models\StudentProfile;

class DashboardController extends Controller
{
    /*
|--------------------------------------------------------------------------
|    Begin::Views0
|--------------------------------------------------------------------------
|
|    All functions that renders or display a page
|
*/

    /** 
     *  Display a listing of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function dashboard_1()
    {
        return view('admin.dashboard.dashboard_1', ['menu_header' => 'Menu', 'title' => "Dashboard", "menu" => "dashboard",  "breadcrumb" => [["name" => "Dashboard"]]]);
    }

    /*
|--------------------------------------------------------------------------
|    End::Views
|--------------------------------------------------------------------------
|
*/


    /*
|--------------------------------------------------------------------------
|    Begin::Functions
|-------------------------------------------------------------------------- 
|
*/

    /** 
     *  Retrieves the listing of the resource via Datatable
     * 
     * @return \Yajra\DataTables\Facades\DataTables
     */
    public function ajax_retrieve_total_student_per_year()
    {
        $query = StudentProfile::select('stud_yearOfAdmission', DB::raw('COUNT(*) AS stud_count'))->groupBy('stud_yearOfAdmission')->get();
        $totalRecords = StudentProfile::select(DB::raw('COUNT(*) AS stud_total'))->pluck('stud_total')[0];

        return Datatables::of($query)
            ->with('stud_totalRecords', $totalRecords)
            ->setRowId('stud_yearOfAdmission')
            ->make(true);
    }

    /*
|--------------------------------------------------------------------------
|    End::Functions
|-------------------------------------------------------------------------- 
|
*/
}
