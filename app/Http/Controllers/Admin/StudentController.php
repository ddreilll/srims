<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\StudentProfile;
use App\Enums\AcademicStatusEnum;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Observers\StudentActionObserver;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {

            $query = StudentProfile::with(['course'])
                ->when($request->has('course') && $request->course, function ($query) use ($request) {

                    $query->whereHas('course', function ($query) use ($request) {
                        $query->whereIn('cour_id',  explode(",", $request->course));
                    });
                })->when($request->has('academic_status') && $request->academic_status, function ($query) use ($request) {
                    $query->whereIn('stud_academicStatus', explode(",", $request->academic_status));
                })->when($request->has('admission_year') && $request->admission_year, function ($query) use ($request) {
                    $query->whereIn('stud_yearOfAdmission', explode(",", $request->admission_year));
                })->when($request->has('record_type') && $request->record_type, function ($query) use ($request) {
                    $query->whereIn('stud_recordType', explode(",", $request->record_type));
                })->when($request->has('created_at') && $request->created_at, function ($query) use ($request) {
                    $query->whereBetween('stud_createdAt', explode(",", $request->created_at));
                })->when($request->has('updated_at') && $request->updated_at, function ($query) use ($request) {
                    $query->whereBetween('stud_createdAt', explode(",", $request->updated_at));
                });


            $table = Datatables::eloquent($query)
                ->addColumn('full_name', function ($row) {
                    return $row->full_name;
                })
                ->addColumn('course_code', function ($row) {
                    return $row->course->cour_code;
                })
                ->addColumn('actions', function ($row) {
                    $viewGate      = 'student_show';
                    $editGate      = 'student_edit';
                    $archiveGate    = 'student_archive';
                    $crudRoutePart = 'students';

                    $primaryKey = 'stud_id';
                    $resource = 'student';

                    return view('admin.students.partials.datatableActionBtns', compact(
                        'viewGate',
                        'editGate',
                        'archiveGate',
                        'crudRoutePart',
                        'row',
                        'primaryKey',
                        'resource',
                    ));
                })
                ->editColumn('stud_academicStatus', function ($row) {
                    return $row->stud_academicStatus ? (new AcademicStatusEnum())->getDisplayNames()[$row->stud_academicStatus] : '';
                })
                ->filterColumn('full_name', function ($query, $keyword) {
                    $query->whereRaw("CONCAT(stud_firstName, ' ', stud_middleName, ' ', stud_lastName) like ?", ["%{$keyword}%"])->orWhereRaw("CONCAT(stud_lastName, ', ', stud_firstName, ' ', stud_middleName) like ?", ["%{$keyword}%"]);
                })
                ->rawColumns(['actions']);

            return $table->make(true);
        }

        $filterCourses = Course::select([
            DB::raw('`cour_id` as `id`'),
            DB::raw('`cour_code` as `value`'),
        ])->get()->toArray();

        $filterAcademicStatus = AcademicStatusEnum::getDisplayNames();
        $filterAcademicStatus = array_map(function ($id, $value) {
            return [
                "id" => $id,
                "value" => $value
            ];
        }, array_keys($filterAcademicStatus), $filterAcademicStatus);

        $filterYearOfAdmission = SchoolYear::select([
            DB::raw('`syear_year` as `value`'),
        ])->get()->toArray();

        return view('admin.students.index', compact('filterCourses', 'filterAcademicStatus', 'filterYearOfAdmission'));
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
    public function show(StudentProfile $student, Request $request)
    {
        abort_if(Gate::denies('student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activityLogs = $student->getActivityLogs();

        switch ($request->input('tab', 'personal')) {
            case 'personal':
                (new StudentActionObserver)->viewed($student, 'Personal & Student profile');

                return view('admin.students.show_personal', compact('student', 'activityLogs'));

                break;

            case 'documents':
                abort_if(Gate::denies('student_show_documents'), Response::HTTP_FORBIDDEN, '403 Forbidden');

                (new StudentActionObserver)->viewed($student, 'Documents');

                return view('admin.students.show_documents', compact('student', 'activityLogs'));

                break;

            case 'scholastic':

                if ($student->stud_recordType == "NONSIS") {

                    abort_if(Gate::denies('student_show_scholastic'), Response::HTTP_FORBIDDEN, '403 Forbidden');

                    (new StudentActionObserver)->viewed($student, 'Scholastic data');

                    return view('admin.students.show_scholastic', compact('student', 'activityLogs'));
                } else {
                    abort(Response::HTTP_NOT_FOUND);
                }

                break;
        }
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
     */
    public function destroy(StudentProfile $student)
    {
        abort_if(Gate::denies('student_archive'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->delete();

        session()->flash('info', __('global.archive_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.student.title_singular'))]));

        return redirect()->route('students.index');
    }
}
