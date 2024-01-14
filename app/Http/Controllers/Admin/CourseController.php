<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Course::select(sprintf('%s.*', (new Course)->table));

            $table = Datatables::eloquent($query);

            $table->editColumn('cour_code', function ($row) {
                return $row->cour_code ? $row->cour_code : '';
            });

            $table->editColumn('cour_name', function ($row) {
                return $row->cour_name ? $row->cour_name : '';
            });

            $table->addColumn('actions', function ($row) {
                $editGate      = 'course_edit';
                $deleteGate    = 'course_delete';

                $crudRoutePart = 'settings.courses';
                $primaryKey = 'cour_id';
                $resource = 'course';

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
        return view('admin.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course = Course::create($request->all());

        session()->flash('message', __('global.create_success', ["attribute" => sprintf("<b>%s %s</b>", __('global.new'), __('cruds.course.title_singular'))]));

        return redirect()->route('settings.courses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->all());

        session()->flash('message', __('global.update_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.course.title_singular'))]));

        return redirect()->route('settings.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->delete();

        session()->flash('info', __('global.delete_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.course.title_singular'))]));

        return redirect()->route('settings.courses.index');
    }

    public function select2(Request $request)
    {
        $term = trim($request->term);
        $course = Course::select(
            DB::raw('cour_id as id'),
            DB::raw('cour_code as text'),
        )->where('cour_code', 'LIKE',  '%' . $term . '%')
            ->simplePaginate(10);

        $morePages = true;

        if (empty($course->nextPageUrl())) {
            $morePages = false;
        }

        $results = array(
            "results" => $course->items(),
            "pagination" => array(
                "more" => $morePages
            )
        );

        return response()->json($results);
    }
}
