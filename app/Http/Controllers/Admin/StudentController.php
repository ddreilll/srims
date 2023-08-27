<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use App\Enums\RecordTypeEnum;
use App\Models\StudentGrades;
use Illuminate\Http\Response;
use App\Models\PreviousSchool;
use App\Models\StudentProfile;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Enums\AcademicStatusEnum;
use App\Enums\AdmissionStatusEnum;
use App\Models\DocumentsSubmitted;
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

            $query = StudentProfile::with(['course', 'honor'])
                ->when($request->has('course') && $request->course, function ($query) use ($request) {
                    $query->whereHas('course', function ($query) use ($request) {
                        $query->whereIn('cour_id',  explode(",", $request->course));
                    });
                })->when($request->has('academic_status') && $request->academic_status, function ($query) use ($request) {
                    $query->whereIn('stud_academicStatus', explode(",", $request->academic_status));
                })->when($request->has('admission_type') && $request->admission_type, function ($query) use ($request) {
                    $query->whereIn('stud_admissionType', explode(",", $request->admission_type));
                })->when($request->has('admission_year') && $request->admission_year, function ($query) use ($request) {
                    $query->whereIn('stud_yearOfAdmission', explode(",", $request->admission_year));
                })->when($request->has('record_type') && $request->record_type, function ($query) use ($request) {
                    $query->whereIn('stud_recordType', explode(",", $request->record_type));
                })->when($request->has('honorable_dismissed') && $request->honorable_dismissed, function ($query) use ($request) {
                    $query->where('stud_isHonorableDismissed', $request->honorable_dismissed);
                })->when($request->has('created_at') && $request->created_at, function ($query) use ($request) {
                    $query->whereBetween('stud_createdAt', explode(",", $request->created_at));
                })->when($request->has('updated_at') && $request->updated_at, function ($query) use ($request) {
                    $query->whereBetween('stud_createdAt', explode(",", $request->updated_at));
                })->when($request->has('archived_at') && $request->archived_at, function ($query) use ($request) {
                    $query->whereBetween('archived_at', explode(",", $request->archived_at));
                })->when($request->has('show_archived') && $request->show_archived == "1", function ($query) use ($request) {
                    $query->onlyArchived();
                })->when($request->has('show_archived') && $request->show_archived == "1", function ($query) use ($request) {
                    $query->onlyArchived();
                })->when(!$request->has('show_archived') || $request->has('show_archived') && $request->show_archived == "0", function ($query) use ($request) {
                    $query->withoutArchived();
                });


            $table = Datatables::eloquent($query)
                ->addColumn('full_name', function ($row) {
                    return $row->full_name;
                })
                ->addColumn('course_code', function ($row) {
                    return $row->course->cour_code;
                })
                ->addColumn('remarks', function ($row) {
                    $hasHonor = $row->honor && $row->stud_academicStatus == AcademicStatusEnum::GRADUATED ? sprintf('<span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="tooltip-inverse" title="%s"><i class="fa-duotone fa-file-certificate text-warning fs-4"></i></span>', $row->honor->honor_name) : "";

                    return $row->stud_isHonorableDismissed ? sprintf('%s <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="tooltip-inverse" title="%s"><i class="fa-duotone fa-arrow-right-from-bracket ms-2 text-danger fs-4"></i></span>', $hasHonor, __('Honorable Dismissed')) : "";
                })
                ->addColumn('actions', function ($row) {
                    $viewGate      = 'student_show';
                    $editGate      = 'student_edit';
                    $archiveGate    = 'student_archive';
                    $docuEvalGate = 'student_generate_document_evaluation';
                    $scholasticGate = 'student_generate_scholastic_data';
                    $unarchiveGate = 'student_archive_unarchive';

                    $resource = 'student';

                    $viewData = [];

                    if (!$row->archived()) {
                        $viewData = [
                            "viewGate" => $viewGate,
                            "editGate" => $editGate,
                            "archiveGate" => $archiveGate,
                            "docuEvalGate" => $docuEvalGate,
                            "scholasticGate" => $scholasticGate,
                            "resource" => $resource,
                            "row" => $row,
                        ];
                    } else {
                        $viewData = [
                            "viewGate" => $viewGate,
                            "resource" => $resource,
                            "unarchiveGate" => $unarchiveGate,
                            "docuEvalGate" => $docuEvalGate,
                            "scholasticGate" => $scholasticGate,
                            "row" => $row,
                        ];
                    }

                    return view('admin.students.partials.datatable-action-btns', $viewData);
                })
                ->editColumn('stud_createdAt', function ($row) {
                    return $row->stud_createdAt ? Carbon::createFromFormat('Y-m-d H:i:s', $row->stud_createdAt)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
                })
                ->editColumn('stud_updatedAt', function ($row) {
                    return $row->stud_updatedAt ? Carbon::createFromFormat('Y-m-d H:i:s', $row->stud_updatedAt)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
                })
                ->editColumn('stud_admissionType', function ($row) {
                    return $row->stud_admissionType ? (new AdmissionStatusEnum())->getDisplayNames()[$row->stud_admissionType] : '';
                })
                ->editColumn('stud_academicStatus', function ($row) {
                    $display = (new AcademicStatusEnum())->getDisplayNames()[$row->stud_academicStatus];

                    if ($row->stud_academicStatus == AcademicStatusEnum::GRADUATED) {
                        return sprintf("%s <br> on %s", $display, (new Carbon($row->stud_dateExited))->format('m-d-Y'));
                    } else {
                        return $display;
                    }
                })
                ->editColumn('stud_recordType', function ($row) {
                    return $row->stud_recordType ? (new RecordTypeEnum())->getDisplayNames()[$row->stud_recordType] : '';
                })
                ->filterColumn('full_name', function ($query, $keyword) {
                    $query->whereRaw("CONCAT(stud_firstName, ' ', stud_middleName, ' ', stud_lastName) like ?", ["%{$keyword}%"])->orWhereRaw("CONCAT(stud_lastName, ', ', stud_firstName, ' ', stud_middleName) like ?", ["%{$keyword}%"]);
                })
                ->rawColumns(['actions', 'remarks', 'stud_academicStatus']);

            return $table->make(true);
        }

        $filterCourses = Course::select([
            DB::raw('`cour_id` as `id`'),
            DB::raw('`cour_code` as `value`'),
        ])->get()->toArray();

        $filterAcademicStatus = collect(AcademicStatusEnum::getSelectable())->map(function ($academicStatus, $key) {
            return [
                "id" => $key,
                "value" => $academicStatus,
            ];
        })->values()->all();

        $filterAdmissionType = collect(AdmissionStatusEnum::getDisplayNames())->map(function ($admissionType, $key) {
            return [
                "id" => $key,
                "value" => $admissionType,
            ];
        })->values()->all();

        $filterYearOfAdmission = SchoolYear::select([
            DB::raw('`syear_year` as `id`'),
            DB::raw('`syear_year` as `value`'),
        ])->get()->toArray();

        addJavascriptFile(asset('assets/js/datatables.js'));
        return view('admin.students.index', compact('filterCourses', 'filterAcademicStatus', 'filterYearOfAdmission', 'filterAdmissionType'));
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
        $activityLogs = $student->getActivityLogs();

        switch ($request->input('tab', 'personal')) {
            case 'personal':
                (new StudentActionObserver)->viewed($student, 'Personal & Student profile');

                return view('admin.students.show-personal', compact('student', 'activityLogs'));

                break;

            case 'documents':
                abort_if(Gate::denies('student_show_documents'), Response::HTTP_FORBIDDEN, '403 Forbidden');

                (new StudentActionObserver)->viewed($student, 'Documents');

                return view('admin.students.show-documents', compact('student', 'activityLogs'));

                break;

            case 'scholastic':

                if ($student->stud_recordType == "NONSIS") {

                    abort_if(Gate::denies('student_show_scholastic'), Response::HTTP_FORBIDDEN, '403 Forbidden');

                    (new StudentActionObserver)->viewed($student, 'Scholastic data');

                    return view('admin.students.show-scholastic', compact('student', 'activityLogs'));
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
        abort_if(Gate::denies('student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->delete();

        (new StudentActionObserver)->deleted($student);

        session()->flash('info', __('global.delete_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.student.title_singular'))]));

        return redirect()->route('students.index');
    }

    /**
     * Aechive the specified resource from storage.
     */
    public function archive(StudentProfile $student)
    {
        abort_if(Gate::denies('student_archive'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->archive();

        (new StudentActionObserver)->archived($student);

        session()->flash('info', __('global.archive_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.student.title_singular'))]));

        return redirect()->route(previousRoute(), $student->stud_id);
    }

    /**
     * Unarchive the specified resource from storage.
     */
    public function unarchive(StudentProfile $student)
    {
        abort_if(Gate::denies('student_archive_unarchive'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->unarchive();

        (new StudentActionObserver)->unarchived($student);

        session()->flash('info', __('global.unarchive_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.student.title_singular'))]));

        return redirect()->route(previousRoute(), $student->stud_id);
    }

    /**
     * Exports
     */

    /**
     * Export the specified resource.
     */
    public function exportDocuments(StudentProfile $student, Request $request)
    {
        $student = StudentProfile::where('stud_id', $student->stud_id)->with('course', function ($query) {
            return $query->withTrashed();
        })->first();

        $dsi = new DocumentsSubmitted();
        $documents['all']["entrance"] = $dsi->leftjoin("s_documents", 'subm_document', '=', 'docu_id')
            ->where(["subm_documentCategory" => "ENTRANCE", "subm_student" => $student->stud_id])->get();
        $documents['all']["records"] = $dsi->leftjoin("s_documents", 'subm_document', '=', 'docu_id')
            ->where(["subm_documentCategory" => "RECORDS", "subm_student" => $student->stud_id, "docu_isPermanent" => "NO"])->get();
        $documents['all']["exit"] = $dsi->leftjoin("s_documents", 'subm_document', '=', 'docu_id')
            ->where(["subm_documentCategory" => "EXIT", "subm_student" => $student->stud_id])->get();

        $documents['default']["records"]['regcert'] = $dsi->leftjoin("s_documents", 'subm_document', '=', 'docu_id')
            ->where(["subm_documentCategory" => "RECORDS", "subm_student" => $student->stud_id, "docu_id" => "1"])
            ->orderBy('subm_documentType', 'desc')
            ->orderBy('subm_documentType_1', 'desc')->get();

        $paper_size = ($request->has('size')) ? (($request->input('size') != '') ? $request->input('size') : 'legal') : 'legal';

        $pdf = Pdf::loadView('admin.students.pdf.documents', compact('student', 'documents'))->setPaper($paper_size);

        $pdf->render();

        $canvas = $pdf->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        if ($student->archived()) {

            $canvas->set_opacity(.3, "Multiply");
            $canvas->page_text(
                $width / 4.7,
                $height / 2,
                'ARCHIVED',
                null,
                65,
                array(255, 0, 0),
                2,
                2,
                -20
            );

            $canvas->set_opacity(.4, "Multiply");
            $canvas->page_text(
                $width / 2.3,
                $height / 1.90,
                $student->archived_at,
                null,
                10,
                array(255, 0, 0),
                0,
                2,
                -20
            );
        }

        $canvas->set_opacity(.5, "Multiply");

        return $pdf->stream();
    }

    /**
     * Export the specified resource.
     */
    public function exportScholastic(StudentProfile $student, Request $request)
    {
        abort_if($student->stud_recordType != 'NONSIS', Response::HTTP_NOT_FOUND);

        $tp = $student->leftJoin('s_course', 'cour_stud_id', '=', 'cour_id')
            ->selectRaw('r_student.*
            , md5(stud_id) as stud_id_md5
            , cour_name as stud_course_name
            , cour_code as stud_course 
            , DATE_FORMAT(stud_createdAt, "%Y-%m-%d") as `stud_createdAt_m_f`
            , DATE_FORMAT(stud_createdAt, "%r") as `stud_createdAt_t_f`
            , IFNULL(DATE_FORMAT(stud_updatedAt, "%Y-%m-%d"), "") as `stud_updatedAt_m_f`
            , IFNULL(DATE_FORMAT(stud_updatedAt, "%r"), "") as `stud_updatedAt_t_f`
            ')
            ->where('stud_id', $student->stud_id)
            ->get();

        $vd = [];

        $fp = $tp[0];
        $sId = $fp['stud_id'];

        $ps = new PreviousSchool();
        $fp['stud_sPrimary'] = $ps->where(["extsch_stud_id" => $sId, "extsch_educType" => "PRIMARY"])
            ->get();

        $fp['stud_sSecondary'] = $ps->where(["extsch_stud_id" => $sId, "extsch_educType" => "SECONDARY"])
            ->get();

        $fp['stud_sPrimary'] = (sizeOf($fp['stud_sPrimary']) == 1) ? $fp['stud_sPrimary'][0] : [];
        $fp['stud_sSecondary'] = (sizeOf($fp['stud_sSecondary']) == 1) ? $fp['stud_sSecondary'][0] : [];


        if ($fp['stud_admissionType'] == "TRANSFEREE" || $fp['stud_admissionType'] == "LADDERIZED") {

            $fp['stud_sTertiary'] = $ps->where(["extsch_stud_id" => $sId, "extsch_educType" => "TRANSFER"])
                ->get();
        }

        if ($fp['stud_recordType'] == "NONSIS") {
            $g = [];
            $g['total_semester'] = 0;
            $g['total_summer_semester'] = 0;

            $sg = new StudentGrades();
            $school_year = $sg->leftJoin('s_class', 'class_enrsub_id', '=', 'class_id')
                ->selectRaw('DISTINCT class_acadYear as acad_year
                        , CONCAT(class_acadYear, " - ", class_acadYear + 1) as acad_year_long
                        , CONCAT(class_acadYear, "-\'" ,SUBSTRING(class_acadYear + 1, 3, 2)) as acad_year_short
                        ')
                ->whereRaw('stud_enrsub_id = "' . $sId . '"')
                ->orderBy('acad_year', 'desc')
                ->get();

            $i = 0;
            foreach ($school_year as $year) {

                $semesters = $sg->leftJoin('s_class', 'class_enrsub_id', '=', 'class_id')
                    ->leftJoin('s_term', 'class_term_id', '=', 'term_id')
                    ->selectRaw('DISTINCT term_name, term_order')
                    ->whereRaw('stud_enrsub_id = "' . $sId . '" and class_acadYear = "' . $year->acad_year . '"')
                    ->orderBy('term_order', 'desc')
                    ->get();

                $a = 0;
                foreach ($semesters as $semester) {
                    $g['total_semester'] += 1;

                    if ($semester['term_name'] == "Summer Semester") {
                        $g['total_summer_semester'] += 1;
                    }

                    $grades = $sg->leftJoin('r_student', 'stud_enrsub_id', '=', 'stud_id')
                        ->leftJoin('s_class', 'class_enrsub_id', '=', 'class_id')
                        ->leftJoin('s_instructor', 'class_inst_id', '=', 'inst_id')
                        ->leftJoin('s_subject', 'class_subj_id', '=', 'subj_id')
                        ->leftJoin('s_term', 'class_term_id', '=', 'term_id')
                        ->selectRaw('t_student_enrolled_subjects.*
                    , md5(enrsub_id) as enrsub_id_md5
                    , inst_firstName as enrsub_inst_firstName
                    , inst_middleName as enrsub_inst_middleName
                    , inst_lastName as enrsub_inst_lastName
                    , inst_suffix as enrsub_inst_suffixName
                    , subj_code as enrsub_subj_code
                    , subj_name as enrsub_subj_name
                    , subj_units as enrsub_subj_units
                    , class_section as enrsub_sche_section
                    ')
                        ->whereRaw('stud_enrsub_id = "' . $sId . '" and term_name = "' . $semester->term_name . '"and class_acadYear = "' . $year->acad_year . '"')
                        ->get();

                    $b = 0;
                    foreach ($grades as $grade) {


                        $grades[$b]['enrsub_grade_display'] = $grade['enrsub_finalRating'];
                        $grades[$b]['enrsub_grade_display_status'] = $grade['enrsub_grade_status'];

                        $grades[$b]['enrsub_inst_fullName'] = format_name(1, "",  $grades[$b]['enrsub_inst_firstName'], $grades[$b]['enrsub_inst_middleName'], $grades[$b]['enrsub_inst_lastName'], $grades[$b]['enrsub_inst_suffixName']);

                        $b++;
                    }

                    $semesters[$a]['subjects'] = $grades;
                    $a++;
                }

                $school_year[$i]['semesters'] = $semesters;
                $i++;
            }

            $g["grades"] = $school_year;

            $vd = array_merge($vd, [
                "stud_grades" => $g['grades'], "stud_total_semester" => $g['total_semester'], "stud_total_summer_semester" => $g['total_summer_semester']
            ]);
        }

        $dsi = new DocumentsSubmitted();
        $ds["entrance"] = $dsi->leftjoin("s_documents", 'subm_document', '=', 'docu_id')
            ->where(["subm_documentCategory" => "ENTRANCE", "subm_student" => $sId])->get();
        $ds["records"] = $dsi->leftjoin("s_documents", 'subm_document', '=', 'docu_id')
            ->where(["subm_documentCategory" => "RECORDS", "subm_student" => $sId, "docu_isPermanent" => "NO"])->get();
        $ds["exit"] = $dsi->leftjoin("s_documents", 'subm_document', '=', 'docu_id')
            ->where(["subm_documentCategory" => "EXIT", "subm_student" => $sId])->get();

        $dfs["records"]['regcert'] = $dsi->leftjoin("s_documents", 'subm_document', '=', 'docu_id')
            ->where(["subm_documentCategory" => "RECORDS", "subm_student" => $sId, "docu_id" => "1"])
            ->orderBy('subm_documentType', 'desc')
            ->orderBy('subm_documentType_1', 'desc')->get();


        $paper_size = ($request->has('size')) ? (($request->input('size') != '') ? $request->input('size') : 'legal') : 'legal';

        $pdf = Pdf::loadView('admin.students.pdf.scholastic-data', compact('student', 'vd'))->setPaper($paper_size);

        if (sizeof($tp) == 1) {

            $vd = [];

            $fp = $tp[0];
            $sId = $fp['stud_id'];

            $ps = new PreviousSchool();
            $fp['stud_sPrimary'] = $ps->where(["extsch_stud_id" => $sId, "extsch_educType" => "PRIMARY"])
                ->get();

            $fp['stud_sSecondary'] = $ps->where(["extsch_stud_id" => $sId, "extsch_educType" => "SECONDARY"])
                ->get();

            $fp['stud_sPrimary'] = (sizeOf($fp['stud_sPrimary']) == 1) ? $fp['stud_sPrimary'][0] : [];
            $fp['stud_sSecondary'] = (sizeOf($fp['stud_sSecondary']) == 1) ? $fp['stud_sSecondary'][0] : [];


            if ($fp['stud_admissionType'] == "TRANSFEREE" || $fp['stud_admissionType'] == "LADDERIZED") {

                $fp['stud_sTertiary'] = $ps->where(["extsch_stud_id" => $sId, "extsch_educType" => "TRANSFER"])
                    ->get();
            }

            if ($fp['stud_recordType'] == "NONSIS") {
                $g = [];
                $g['total_semester'] = 0;
                $g['total_summer_semester'] = 0;

                $sg = new StudentGrades();
                $school_year = $sg->leftJoin('s_class', 'class_enrsub_id', '=', 'class_id')
                    ->selectRaw('DISTINCT class_acadYear as acad_year
                        , CONCAT(class_acadYear, " - ", class_acadYear + 1) as acad_year_long
                        , CONCAT(class_acadYear, "-\'" ,SUBSTRING(class_acadYear + 1, 3, 2)) as acad_year_short
                        ')
                    ->whereRaw('stud_enrsub_id = "' . $sId . '"')
                    ->orderBy('acad_year', 'desc')
                    ->get();

                $i = 0;
                foreach ($school_year as $year) {

                    $semesters = $sg->leftJoin('s_class', 'class_enrsub_id', '=', 'class_id')
                        ->leftJoin('s_term', 'class_term_id', '=', 'term_id')
                        ->selectRaw('DISTINCT term_name, term_order')
                        ->whereRaw('stud_enrsub_id = "' . $sId . '" and class_acadYear = "' . $year->acad_year . '"')
                        ->orderBy('term_order', 'desc')
                        ->get();

                    $a = 0;
                    foreach ($semesters as $semester) {
                        $g['total_semester'] += 1;

                        if ($semester['term_name'] == "Summer Semester") {
                            $g['total_summer_semester'] += 1;
                        }

                        $grades = $sg->leftJoin('r_student', 'stud_enrsub_id', '=', 'stud_id')
                            ->leftJoin('s_class', 'class_enrsub_id', '=', 'class_id')
                            ->leftJoin('s_instructor', 'class_inst_id', '=', 'inst_id')
                            ->leftJoin('s_subject', 'class_subj_id', '=', 'subj_id')
                            ->leftJoin('s_term', 'class_term_id', '=', 'term_id')
                            ->selectRaw('t_student_enrolled_subjects.*
                    , md5(enrsub_id) as enrsub_id_md5
                    , inst_firstName as enrsub_inst_firstName
                    , inst_middleName as enrsub_inst_middleName
                    , inst_lastName as enrsub_inst_lastName
                    , inst_suffix as enrsub_inst_suffixName
                    , subj_code as enrsub_subj_code
                    , subj_name as enrsub_subj_name
                    , subj_units as enrsub_subj_units
                    , class_section as enrsub_sche_section
                    ')
                            ->whereRaw('stud_enrsub_id = "' . $sId . '" and term_name = "' . $semester->term_name . '"and class_acadYear = "' . $year->acad_year . '"')
                            ->get();

                        $b = 0;
                        foreach ($grades as $grade) {


                            $grades[$b]['enrsub_grade_display'] = $grade['enrsub_finalRating'];
                            $grades[$b]['enrsub_grade_display_status'] = $grade['enrsub_grade_status'];

                            $grades[$b]['enrsub_inst_fullName'] = format_name(1, "",  $grades[$b]['enrsub_inst_firstName'], $grades[$b]['enrsub_inst_middleName'], $grades[$b]['enrsub_inst_lastName'], $grades[$b]['enrsub_inst_suffixName']);

                            $b++;
                        }

                        $semesters[$a]['subjects'] = $grades;
                        $a++;
                    }

                    $school_year[$i]['semesters'] = $semesters;
                    $i++;
                }

                $g["grades"] = $school_year;

                $vd = array_merge($vd, [
                    "stud_grades" => $g['grades'], "stud_total_semester" => $g['total_semester'], "stud_total_summer_semester" => $g['total_summer_semester']
                ]);
            }

            $dsi = new DocumentsSubmitted();
            $ds["entrance"] = $dsi->leftjoin("s_documents", 'subm_document', '=', 'docu_id')
                ->where(["subm_documentCategory" => "ENTRANCE", "subm_student" => $sId])->get();
            $ds["records"] = $dsi->leftjoin("s_documents", 'subm_document', '=', 'docu_id')
                ->where(["subm_documentCategory" => "RECORDS", "subm_student" => $sId, "docu_isPermanent" => "NO"])->get();
            $ds["exit"] = $dsi->leftjoin("s_documents", 'subm_document', '=', 'docu_id')
                ->where(["subm_documentCategory" => "EXIT", "subm_student" => $sId])->get();


            // Get fixed Documents

            // -- Records

            // --- Registration Cards
            $dfs["records"]['regcert'] = $dsi->leftjoin("s_documents", 'subm_document', '=', 'docu_id')
                ->where(["subm_documentCategory" => "RECORDS", "subm_student" => $sId, "docu_id" => "1"])
                ->orderBy('subm_documentType', 'desc')
                ->orderBy('subm_documentType_1', 'desc')->get();

            // return $vd['stud_grades'][0];
            $pdf = Pdf::loadView('admin.students.pdf.scholastic-data', compact('student', 'vd'));

            $pdf->render();

            $canvas = $pdf->getCanvas();

            $height = $canvas->get_height();
            $width = $canvas->get_width();

            if ($student->archived()) {

                $canvas->set_opacity(.3, "Multiply");
                $canvas->page_text(
                    $width / 4.7,
                    $height / 2,
                    'ARCHIVED',
                    null,
                    65,
                    array(255, 0, 0),
                    2,
                    2,
                    -20
                );

                $canvas->set_opacity(.4, "Multiply");
                $canvas->page_text(
                    $width / 2.3,
                    $height / 1.90,
                    $student->archived_at,
                    null,
                    10,
                    array(255, 0, 0),
                    0,
                    2,
                    -20
                );
            }

            $canvas->set_opacity(.5, "Multiply");
            $canvas->page_text(35, $height - 30, $student->stud_studentNo . " | Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));

            return $pdf->stream();
        } else {

            return response(NULL, 404);
        };
    }
}
