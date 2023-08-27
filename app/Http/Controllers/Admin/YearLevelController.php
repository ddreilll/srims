<?php

namespace App\Http\Controllers\Admin;

use App\Models\YearLevel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreYearLevelRequest;
use App\Http\Requests\UpdateYearLevelRequest;
use Yajra\DataTables\Facades\DataTables;

class YearLevelController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('year_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = YearLevel::select(sprintf('%s.*', (new YearLevel)->table));

            $table = Datatables::eloquent($query);

            $table->editColumn('year_order', function ($row) {
                return $row->year_order ? $row->year_order : '';
            });

            $table->editColumn('year_name', function ($row) {
                return $row->year_name ? $row->year_name : '';
            });

            $table->addColumn('actions', function ($row) {
                $editGate      = 'year_level_edit';
                $deleteGate    = 'year_level_delete';

                $crudRoutePart = 'settings.year-levels';
                $primaryKey = 'year_id';
                $resource = 'yearlevel';

                return view('partials.dataTables.actionBtns', compact(
                    'editGate',
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

        addJavascriptFile(asset('assets/js/datatables.js'));
        return view('admin.year-levels.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('year_level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.year-levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreYearLevelRequest $request)
    {
        $yearLevel = YearLevel::create($request->all());

        session()->flash('message', __('global.create_success', ["attribute" => sprintf("<b>%s %s</b>", __('global.new'), __('cruds.yearLevel.title_singular'))]));

        return redirect()->route('settings.year-levels.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(YearLevel $yearLevel)
    {
        abort_if(Gate::denies('year_level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.year-levels.edit', compact('yearLevel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateYearLevelRequest $request, YearLevel $yearLevel)
    {
        $yearLevel->update($request->all());

        session()->flash('message', __('global.update_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.yearLevel.title_singular'))]));

        return redirect()->route('settings.year-levels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(YearLevel $yearLevel)
    {
        abort_if(Gate::denies('year_level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yearLevel->delete();

        session()->flash('info', __('global.delete_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.yearLevel.title_singular'))]));

        return back();
    }
}
