<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        addJavascriptFile(asset('assets/js/datatables.js'));
        return view('admin.dashboards.index');
    }

    public function ajax_retrieve_total_student_per_year()
    {
        $query = StudentProfile::select('stud_yearOfAdmission', DB::raw('COUNT(*) AS stud_count'))->groupBy('stud_yearOfAdmission')->get();
        $totalRecords = StudentProfile::select(DB::raw('COUNT(*) AS stud_total'))->pluck('stud_total')[0];

        return Datatables::of($query)
            ->with('stud_totalRecords', $totalRecords)
            ->setRowId('stud_yearOfAdmission')
            ->make(true);
    }
}
