<?php

namespace App\Http\Controllers\Admin;

use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreSchoolYearRequest;
use Yajra\DataTables\Facades\DataTables;

class SchoolYearController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('school_year_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SchoolYear::select(sprintf('%s.*', (new SchoolYear)->table));

            $table = Datatables::eloquent($query);

            $table->editColumn('syear_year', function ($row) {
                return $row->syear_year ? $row->syear_year : '';
            });

            $table->addColumn('actions', function ($row) {
                $deleteGate    = 'school_year_delete';

                $crudRoutePart = 'settings.school-years';
                $primaryKey = 'syear_id';
                $resource = 'schoolyear';

                return view('partials.dataTables.actionBtns', compact(
                    'deleteGate',
                    'crudRoutePart',
                    'primaryKey',
                    'resource',
                    'row'
                ));
            });

            $table->rawColumns(['actions']);

            return $table->make(true);
        }

        return view('admin.school-years.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('school_year_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.school-years.create');
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
        abort_if(Gate::denies('school_year_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
