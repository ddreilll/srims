<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//Controller 
use App\Http\Controllers\Admin\ScheduleController as ScheduleController;

//Model
use App\Models\StudentProfile;

use App\Models\StudentGrades;
use App\Models\Schedule;
use App\Models\TimeSlot;

class ClassController extends Controller
{
    /*
|--------------------------------------------------------------------------
|    Begin::Views
|--------------------------------------------------------------------------
|
|    All functions that renders or display a page
|
*/

    public function index(Request $request)
    {

        return view('admin.class.index', ['menu_header' => 'Menu', 'title' => "Class List", "menu" => "student-records", "sub_menu" => "student-grades", "breadcrumb" => [["name" => "Class List"]]]);
    }

    public function show_class($class_md5_id)
    {
        $fs = Schedule::leftJoin('s_room', 'room_sche_id', '=', 'room_id')
            ->leftJoin('s_subject', 'subj_sche_id', '=', 'subj_id')
            ->leftJoin('s_instructor', 'inst_sche_id', '=', 'inst_id')
            ->leftJoin('s_term', 'term_sche_id', '=', 'term_id')
            ->selectRaw('
             sche_id 
            , md5(sche_id) as sche_id_md5
            , sche_filelink as class_file_link
            , subj_code as class_subj_code
            , subj_name as class_subj_name
            , sche_section as class_section
            , CONCAT(term_name, ", ", sche_acadYear, "-", sche_acadYear + 1) as class_sem_sy
            , room_name as class_room
            , CONCAT(inst_firstName, " ", inst_lastName) as class_instructor')
            ->whereRaw("md5(sche_id) = '" . $class_md5_id . "'")
            ->get();

        if (sizeOf($fs) == 1) {

            $fs = $fs[0];

            $sched_timeSlot_day = "";
            $sched_timeSlot_time = "";

            $ts = new TimeSlot();
            $sched_timeSlots = $ts->select(['time_id', 'time_day', 'time_duration'])
                ->where("sche_time_id",   $fs->sche_id)
                ->get();

            if (sizeOf($sched_timeSlots) == 1) {
                $sched_timeSlot_day .= ($sched_timeSlots[0]['time_day']) ? $sched_timeSlots[0]['time_day'] : "";
                $sched_timeSlot_time .= ($sched_timeSlots[0]['time_duration']) ? $sched_timeSlots[0]['time_duration'] : "";
            } else if (sizeOf($sched_timeSlots) >= 1) {

                for ($a = 0; $a < sizeOf($sched_timeSlots); $a++) {

                    if ($a == 0) { // start

                        $sched_timeSlot_day .= ($sched_timeSlots[$a]['time_day']) ? $sched_timeSlots[$a]['time_day'] . "/" : "";
                        $sched_timeSlot_time .= ($sched_timeSlots[$a]['time_duration']) ? $sched_timeSlots[$a]['time_duration'] . "/" : "";
                    } else if (($a != sizeOf($sched_timeSlots) - 1) && ($a > 0 && $a < sizeOf($sched_timeSlots) - 1)) { // mid

                        $sched_timeSlot_day .= ($sched_timeSlots[$a]['time_day']) ? $sched_timeSlots[$a]['time_day'] . "/" : "";
                        $sched_timeSlot_time .= ($sched_timeSlots[$a]['time_duration']) ? $sched_timeSlots[$a]['time_duration'] . "/" : "";
                    } else if ($a == sizeOf($sched_timeSlots) - 1) { // last

                        $sched_timeSlot_day .= ($sched_timeSlots[$a]['time_day']) ? $sched_timeSlots[$a]['time_day'] : "";
                        $sched_timeSlot_time .= ($sched_timeSlots[$a]['time_duration']) ? $sched_timeSlots[$a]['time_duration'] : "";
                    }
                }
            }

            $fs['class_day_time'] = ($sched_timeSlot_day ? $sched_timeSlot_day : "") . ($sched_timeSlot_time ? " " . $sched_timeSlot_time : "");
        }

        return view('admin.class.show', ['menu_header' => 'Menu', 'title' => "Student Grades", "menu" => "student-records", "sub_menu" => "student-grades", "class" => $fs, "breadcrumb" => [["name" => "Class List", "url" => "/class"], ["name" => "Class details"]]]);
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


    public function createStudentGrade($student_details)
    {
        (new StudentGrades)->insertOne($student_details);
    }

    public function getAllStudentGrades($size = 10, $filter = null)
    {
        return (new StudentGrades)->fetchAll($size, $filter);
    }

    public function getStudentGrade($md5Id)
    {
        return (new StudentGrades)->fetchOne($md5Id);
    }

    public function updateStudentGrade($md5Id, $student_details)
    {
        $final_grade = ($student_details['other_grades'] == "W" || $student_details['other_grades'] == "D") ? null : $student_details['grade'];

        (new StudentGrades)->edit($md5Id, [
            'stud_enrsub_id' => $student_details['student'],
            'sche_enrsub_id' => $student_details['schedule'],
            'enrsub_grade' => $final_grade,
            'enrsub_otherGrade' => $student_details['other_grades'],
        ]);
    }

    public function removeStudentGrade($md5Id)
    {
        (new StudentGrades)->remove($md5Id);
    }


    public function getGradesPerStudent($md5Id)
    {
        return (new StudentGrades)->fetchAllPerStudent($md5Id);
    }


    // -- Begin::Ajax Requests -- //


    public function ajax_insert(Request $request)
    {

        $request->validate([
            'student' => 'required',
            'schedule' => 'required',
        ]);

        $this->createStudentGrade($request);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.added_success', ['attribute' => 'Student Grade'])
        ]);
    }

    public function ajax_retrieveAll(Request $request)
    {
        $query = Schedule::leftJoin('s_room', 'room_sche_id', '=', 'room_id')
            ->leftJoin('s_subject', 'subj_sche_id', '=', 'subj_id')
            ->leftJoin('s_instructor', 'inst_sche_id', '=', 'inst_id')
            ->leftJoin('s_term', 'term_sche_id', '=', 'term_id')
            ->selectRaw('s_instructor.*
            , s_subject.*
            , md5(sche_id) as sche_id_md5
            , sche_id 
            , sche_section
            , room_id as sche_room_id
            , room_name as sche_room_code
            , subj_id as sche_subj_id
            , subj_code as sche_subj_code
            , subj_name as sche_subj_name
            , term_sche_id as sche_term_id
            , term_name as sche_term_name
            , CONCAT(sche_acadYear, "-", sche_acadYear + 1) as sche_acadYear
            , CONCAT("SY " , sche_acadYear, "-\'" ,SUBSTRING(sche_acadYear + 1, 3, 2)) as sche_acadYear_short
            , CONCAT(term_name, ", SY ", CONCAT(sche_acadYear, "-", sche_acadYear + 1)) as semester_sy
            , CONCAT(inst_firstName, NULLIF(CONCAT(" ", SUBSTRING(inst_middleName, 1, 1), "."), ""), " ", inst_lastName) as instructor
            , (SELECT COUNT(*) FROM t_student_enrolled_subjects WHERE sche_enrsub_id = sche_id) as enrolled_student_count');

        return Datatables::of($query)
            ->setRowId('sche_id_md5')
            ->addColumn('subject_code', function ($row) {

                return '<a href="' . url('/class') . "/" . $row->sche_id_md5 . '">' . $row->sche_subj_code . '</a>';
            })
            ->addColumn('subject_name', function ($row) {
                return $row->sche_subj_name;
            })
            ->editColumn('section', function ($row) {
                return $row->sche_section;
            })
            ->addColumn('schedule', function ($row) {
                $sched_timeSlot_day = "";
                $sched_timeSlot_time = "";

                $ts = new TimeSlot();
                $sched_timeSlots = $ts->select(['time_id', 'time_day', 'time_duration'])
                    ->where("sche_time_id",   $row->sche_id)
                    ->get();

                if (sizeOf($sched_timeSlots) == 1) {
                    $sched_timeSlot_day .= ($sched_timeSlots[0]['time_day']) ? $sched_timeSlots[0]['time_day'] : "";
                    $sched_timeSlot_time .= ($sched_timeSlots[0]['time_duration']) ? $sched_timeSlots[0]['time_duration'] : "";
                } else if (sizeOf($sched_timeSlots) >= 1) {

                    for ($a = 0; $a < sizeOf($sched_timeSlots); $a++) {

                        if ($a == 0) { // start

                            $sched_timeSlot_day .= ($sched_timeSlots[$a]['time_day']) ? $sched_timeSlots[$a]['time_day'] . "/" : "";
                            $sched_timeSlot_time .= ($sched_timeSlots[$a]['time_duration']) ? $sched_timeSlots[$a]['time_duration'] . "/" : "";
                        } else if (($a != sizeOf($sched_timeSlots) - 1) && ($a > 0 && $a < sizeOf($sched_timeSlots) - 1)) { // mid

                            $sched_timeSlot_day .= ($sched_timeSlots[$a]['time_day']) ? $sched_timeSlots[$a]['time_day'] . "/" : "";
                            $sched_timeSlot_time .= ($sched_timeSlots[$a]['time_duration']) ? $sched_timeSlots[$a]['time_duration'] . "/" : "";
                        } else if ($a == sizeOf($sched_timeSlots) - 1) { // last

                            $sched_timeSlot_day .= ($sched_timeSlots[$a]['time_day']) ? $sched_timeSlots[$a]['time_day'] : "";
                            $sched_timeSlot_time .= ($sched_timeSlots[$a]['time_duration']) ? $sched_timeSlots[$a]['time_duration'] : "";
                        }
                    }
                }

                return ($sched_timeSlot_day ? $sched_timeSlot_day : "") . ($sched_timeSlot_time ? " " . $sched_timeSlot_time : "") . ($row->sche_room_code ? " " . $row->sche_room_code : "");
            })
            ->addColumn('action', function ($row) {

                return '<div class="d-flex justify-content-start flex-shrink-0">
                <a href="' . url('/class') . "/" . $row->sche_id_md5 . '" class="btn btn-icon btn-secondary btn-sm me-1">
                <i class="fas fa-clipboard-list"></i>
                 </a>

                <button type="button" kt_student_grades_table_edit class="btn btn-icon btn-light-warning btn-sm me-1">
                     <i class="fas fa-pen"></i>
                 </button>

                 <button type="button" kt_student_grades_table_delete class="btn btn-icon btn-light-danger btn-sm">
                 <i class="fas fa-trash"></i>
                </button>
            </div>';
            })
            ->rawColumns(['subject_code', 'action'])
            ->make(true);
    }

    public function ajax_retrieve(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode($this->getStudentGrade($request->id));
    }


    public function ajax_add_student_grade(Request $request)
    {
        $request->validate([
            'student' => 'required',
            'class_id' => 'required',
        ]);

        $d = [];
        foreach ($request->student as $s) {

            array_push($d, [
                "enrsub_midtermGrade" => $s['midterm_grade'], "enrsub_finalGrade" => $s["final_grade"], "enrsub_finalRating" => $s["final_rating"], "enrsub_grade_status" => $s["grade_status"], "stud_enrsub_id" => $s['id'], "sche_enrsub_id" => $request->class_id, "enrsub_createdAt" => NOW()
            ]);
        }

        StudentGrades::insert($d);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.added_success', ['attribute' => 'Student Grade'])
        ]);
    }

    public function ajax_retrieve_all_student_grades($class_id)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $query = StudentGrades::leftJoin('r_student', 'stud_enrsub_id', '=', 'stud_id')
            ->leftJoin('s_schedule', 'sche_enrsub_id', '=', 'sche_id')
            ->leftJoin('s_course', 'cour_stud_id', '=', 'cour_id')
            ->select([
                DB::raw('(@rownum  := @rownum  + 1) as `row_no`'), DB::raw('md5(stud_id) as stud_md5_id'), DB::raw('enrsub_id as id'), 'r_student.stud_uuid', 'r_student.stud_studentNo', 'r_student.stud_lastName', 'r_student.stud_firstName', 'r_student.stud_middleName', DB::raw('s_course.cour_code as course'), DB::raw('enrsub_midtermGrade as midterm_grade'), DB::raw('enrsub_finalGrade as final_grade'), DB::raw('enrsub_finalRating as final_rating'), DB::raw('enrsub_grade_status as grade_status')
            ])
            ->where("sche_enrsub_id", $class_id);

        return Datatables::of($query)
            ->setRowId('stud_md5_id')
            ->addColumn('stud_no', function ($row) {

                return '<a href="' . url('/student/profile') . "/" . $row->stud_uuid . '">' . $row->stud_studentNo . '</a>';
            })
            ->addColumn('name', function ($row) {
                return '<span class="fw-bold">' . $row->stud_lastName . ',</span>' . ' ' .  $row->stud_firstName . ' ' . $row->stud_middleName;
            })
            ->addColumn('action', function ($row) {
                return '<div class="d-flex justify-content-start flex-shrink-0">
                <button type="button" kt_student_grades_table_edit class="btn btn-icon btn-light-warning btn-sm me-1">
                     <i class="fas fa-pen"></i>
                 </button>

                 <button type="button" kt_student_grades_table_delete class="btn btn-icon btn-light-danger btn-sm">
                 <i class="fas fa-trash"></i>
                </button>
            </div>';
            })
            ->rawColumns(['stud_no', 'name', 'action'])
            ->make(true);
    }

    public function ajax_edit_student_grade(Request $request)
    {
        $request->validate([
            'grade_id' => 'required',
        ]);

        StudentGrades::where(['enrsub_id' => $request->grade_id])
            ->update([
                "enrsub_midtermGrade" => $request->midterm_grade, "enrsub_finalGrade" => $request->final_grade, "enrsub_finalRating" => $request->final_rating, "enrsub_grade_status" => $request->grade_status
            ]);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.updated_success', ['attribute' => 'Student Grade'])
        ]);
    }

    public function ajax_delete_student_grade(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        StudentGrades::where(['enrsub_id' => $request->id])
            ->delete();

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.deleted_success', ['attribute' => 'Student Grade'])
        ]);
    }

    public function ajax_search_student_profile($class_id)
    {

        $urid = Auth::user()->roles->pluck('id')->toArray()[0];

        // if encoder, show only assigned student records
        $w = [];
        if ($urid == 2) {

            $w = ["user_stud_id" => Auth::user()->id];
        }

        $query = StudentProfile::leftJoin('s_course', 'cour_stud_id', '=', 'cour_id')
            ->select([
                DB::raw("stud_id as id"),
                DB::raw("stud_studentNo as student_no"),
                DB::raw('stud_firstName as first_name'),
                DB::raw('stud_middleName as middle_name'),
                DB::raw('stud_lastName as last_name'),
                DB::raw('cour_code as course'),
            ])
            ->where(array_merge($w, ["stud_recordType" => "NONSIS"]))
            ->whereNotIn('stud_id',  StudentGrades::where(["sche_enrsub_id" => $class_id])->pluck('stud_enrsub_id'));;

        return Datatables::of($query)
            ->setRowId('id')
            ->addColumn('action', function ($row) {
                return '<div class="d-flex justify-content-center flex-shrink-0">
                 <button type="button" kt_modal_add_student_grade_table_import class="btn btn-secondary btn-sm">
                 <i class="fas fa-file-download me-1"></i> Import
                </button>
            </div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }




    // -- End::Ajax Requests -- //

    /*
|--------------------------------------------------------------------------
|    End::Functions
|-------------------------------------------------------------------------- 
|
*/
}
