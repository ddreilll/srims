<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Models\Gradesheet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Enums\GradesheetFileStorageEnum;
use App\Models\Instructor;
use App\Models\Room;
use App\Models\SchoolYear;
use App\Models\Term;
use Yajra\DataTables\Facades\DataTables;

class GradesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('gradesheet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {

            $query = Gradesheet::with(['subject', 'instructor', 'semester', 'room', 'timeSlots', 'pages'])
                ->withCount(['students'])
                ->withSum('pages', 'grdsheetpg_rowNo')
                ->when($request->has('subject') && $request->subject, function ($query) use ($request) {

                    $query->whereHas('subject', function ($query) use ($request) {
                        $query->whereIn('subj_id',  explode(",", $request->subject));
                    });
                })
                ->when($request->has('room') && $request->room, function ($query) use ($request) {

                    $query->whereHas('room', function ($query) use ($request) {
                        $query->whereIn('room_id',  explode(",", $request->room));
                    });
                })
                ->when($request->has('semester') && $request->semester, function ($query) use ($request) {

                    $query->whereHas('semester', function ($query) use ($request) {
                        $query->whereIn('term_id',  explode(",", $request->semester));
                    });
                })
                ->when($request->has('acad_year') && $request->acad_year, function ($query) use ($request) {
                    $query->whereIn('class_acadYear', explode(",", $request->acad_year));
                })
                ->when($request->has('instructor') && $request->instructor, function ($query) use ($request) {

                    $query->whereHas('instructor', function ($query) use ($request) {
                        $query->whereIn('inst_id',  explode(",", $request->instructor));
                    });
                })
                ->when($request->has('file_storge_type') && $request->file_storge_type, function ($query) use ($request) {
                    $query->whereIn('class_fstorage', explode(",", $request->file_storge_type));
                })
                ->when($request->has('total_students') && $request->total_students, function ($query) use ($request) {
                    $totalStudents = explode(",", $request->total_students);
                    $query->has('students', '>=', $totalStudents[0])->has('students', '<=', $totalStudents[1]);
                })
                ->when($request->has('total_slots') && $request->total_slots, function ($query) use ($request) {
                    $query->whereHas('pages', function ($query) use ($request) {

                        $totalSlots = explode(",", $request->total_slots);

                        $query->select(DB::raw('SUM(grdsheetpg_rowNo) as total_slots'))
                            ->havingRaw('total_slots >= ?', [$totalSlots[0]])
                            ->havingRaw('total_slots <= ?', [$totalSlots[1]]);
                    });
                })
                ->when($request->has('created_at') && $request->created_at, function ($query) use ($request) {
                    $query->whereBetween('class_createdAt', explode(",", $request->created_at));
                })
                ->when($request->has('updated_at') && $request->updated_at, function ($query) use ($request) {
                    $query->whereBetween('class_updatedAt', explode(",", $request->updated_at));
                });


            $table = Datatables::eloquent($query)
                ->addColumn('schedule', function ($row) {
                    return $row->getSchedule($row->room ? $row->room->room_name : "", $row->timeSlots);
                })
                ->addColumn('instructor', function ($row) {
                    return $row->instructor->full_name;
                })
                ->editColumn('pages_sum_grdsheetpg_row_no', function ($row) {
                    return sprintf("%s", $row->pages_sum_grdsheetpg_row_no ? $row->pages_sum_grdsheetpg_row_no : 0,);
                })
                ->addColumn('actions', function ($row) {
                    $viewGate      = 'gradesheet_show';
                    $editGate      = 'gradesheet_edit';
                    $deleteGate    = 'gradesheet_delete';

                    $primaryKey = 'class_id';
                    $resource = 'gradesheet';

                    return view('admin.gradesheets.partials.datatable-action-btns', compact(
                        'viewGate',
                        'editGate',
                        'deleteGate',
                        'row',
                        'primaryKey',
                        'resource',
                    ));
                })
                ->editColumn('class_acadYear', function ($row) {
                    return  sprintf("%s - %s", $row->class_acadYear, $row->class_acadYear + 1);
                })
                ->rawColumns(['actions', 'students_count']);

            return $table->make(true);
        }

        $filterSubjects = Subject::select([
            DB::raw('`subj_id` as `id`'),
            DB::raw('`subj_code` as `value`'),
        ])->get()->toArray();

        $filterRooms = Room::select([
            DB::raw('`room_id` as `id`'),
            DB::raw('`room_name` as `value`'),
        ])->get()->toArray();

        $filterSemesters = Term::select([
            DB::raw('`term_id` as `id`'),
            DB::raw('`term_name` as `value`'),
        ])->order()->get()->toArray();

        $filterAcadYears = SchoolYear::select([
            DB::raw('`syear_year` as `id`'),
            DB::raw('CONCAT(`syear_year`," - ", syear_year + 1) as `value`'),
        ])->order()->get()->toArray();

        $filterInstructors = Instructor::get()->map(function ($instructor) {
            $newInstructor['id'] = $instructor->inst_id;
            $newInstructor['value'] = $instructor->full_name;

            return $newInstructor;
        });

        $filterMaxStudent = Gradesheet::withCount(['students'])->get()->map(function ($gradesheet) {
            return $gradesheet->students_count;
        })->max();

        $filterMaxSlots = Gradesheet::withSum('pages', 'grdsheetpg_rowNo')->get()->map(function ($gradesheet) {
            return $gradesheet->pages_sum_grdsheetpg_row_no;
        })->max();

        return view('admin.gradesheets.index', compact('filterSubjects', 'filterRooms', 'filterSemesters', 'filterAcadYears', 'filterInstructors', 'filterMaxStudent', 'filterMaxSlots'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gradesheet $gradesheet)
    {
        abort_if(Gate::denies('gradesheet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gradesheet->delete();

        session()->flash('info', __('global.delete_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.gradesheet.title_singular'))]));

        return redirect()->route('gradesheets.index');
    }
}
