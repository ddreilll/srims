<?php

namespace App\Http\Controllers\Admin;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use Yajra\DataTables\Facades\DataTables;


class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('instructor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Instructor::select(sprintf('%s.*', (new Instructor)->table));

            $table = Datatables::eloquent($query);

            $table->editColumn('inst_empNo', function ($row) {
                return $row->inst_empNo ? $row->inst_empNo : '';
            });

            $table->addColumn('full_name', function ($row) {
                return $row->full_name ? $row->full_name : '';
            });

            $table->addColumn('actions', function ($row) {
                $editGate      = 'instructor_edit';
                $deleteGate    = 'instructor_delete';

                $crudRoutePart = 'settings.instructors';
                $primaryKey = 'inst_id';
                $resource = 'instructor';

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

        return view('admin.instructors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('instructor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstructorRequest $request)
    {
        abort_if(Gate::denies('instructor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instructor = Instructor::create($request->all());

        session()->flash('message', __('global.create_success', ["attribute" => sprintf("<b>%s %s</b>", __('global.new'), __('cruds.instructor.title_singular'))]));

        return redirect()->route('settings.instructors.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        abort_if(Gate::denies('instructor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstructorRequest $request, Instructor $instructor)
    {
        $instructor->update($request->all());

        session()->flash('message', __('global.update_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.instructor.title_singular'))]));

        return redirect()->route('settings.instructors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        abort_if(Gate::denies('room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instructor->delete();

        session()->flash('info', __('global.delete_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.instructor.title_singular'))]));

        return redirect()->route('settings.instructors.index');
    }


    public function ajax_select2_search(Request $request)
    {

        if ($request->ajax()) {

            $term = trim($request->term);
            $instructor = Instructor::select(
                DB::raw('inst_id as id'),
                DB::raw('CONCAT(inst_firstName, COALESCE(CONCAT(" ", SUBSTRING(inst_middleName, 1, 1), "."), ""), " ", inst_lastName) as fullname'),
                DB::raw('inst_empNo as emp_no'),
            )->where('inst_empNo', 'LIKE',  '%' . $term . '%')
                ->orWhere('inst_firstName', 'LIKE',  '%' . $term . '%')
                ->orWhere('inst_middleName', 'LIKE',  '%' . $term . '%')
                ->orWhere('inst_lastName', 'LIKE',  '%' . $term . '%')
                ->orderBy('inst_empNo', 'asc')
                ->simplePaginate(10);

            $morePages = true;

            if (empty($instructor->nextPageUrl())) {
                $morePages = false;
            }

            $results = array(
                "results" => $instructor->items(),
                "pagination" => array(
                    "more" => $morePages
                )
            );

            return response()->json($results);
        }
    }
}
