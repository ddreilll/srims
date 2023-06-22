<?php

namespace App\Http\Controllers\Admin;

use App\Models\Honor;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHonorRequest;
use App\Http\Requests\UpdateHonorRequest;
use App\Http\Requests\StoreSchoolYearRequest;

class SchoolYearController extends Controller
{

    protected $menuHeader = "System Settings";
    protected $menu = "system-settings";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // abort_if(Gate::denies('school_year_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuHeader = $this->menuHeader;
        $menu = $this->menu;


        $title = "School Years";
        $breadcrumb = [
            [
                "name" => "School Years"
            ]
        ];

        $schoolYears = SchoolYear::order()->paginate(10);

        return view('admin.school_years.index', compact('menuHeader', 'title', 'menu', 'breadcrumb', 'schoolYears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // abort_if(Gate::denies('school_year_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuHeader = $this->menuHeader;
        $menu = $this->menu;


        $title = "Add School Year";
        $breadcrumb = [
            [
                "name" => "School Years",
                "url" => route('settings.school-years.index')
            ],
            [
                "name" => "Add School Year"
            ]
        ];

        return view('admin.school_years.create', compact('menuHeader', 'title', 'menu', 'breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSchoolYearRequest $request)
    {
        $honor = SchoolYear::create($request->all());
        session()->flash('message', __('global.create_success', ["attribute" => sprintf("<b>%s %s</b>", __('global.new'), __('cruds.schoolYear.title_singular'))]));

        return redirect()->route('settings.school-years.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolYear $schoolYear)
    {
        // abort_if(Gate::denies('school_year_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schoolYear->delete();

        session()->flash('info', __('global.delete_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.schoolYear.title_singular'))]));

        return back();
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
}
