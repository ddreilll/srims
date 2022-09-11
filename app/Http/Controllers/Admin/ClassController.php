<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//Model
use App\Models\StudentProfile;

use App\Models\StudentGrades;
use App\Models\Schedule;
use App\Models\TimeSlot;
use App\Models\Subject;

class ClassController extends Controller
{
    /*
|--------------------------------------------------------------------------
|    Begin::Views0
|--------------------------------------------------------------------------
|
|    All functions that renders or display a page
|
*/

    /** 
     *  Display a listing of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.class.index', ['menu_header' => 'Menu', 'title' => "Class List", "menu" => "class", "sub_menu" => "student-grades", "breadcrumb" => [["name" => "Class List"]]]);
    }

    /** 
     *  Show the form for creating a new resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.class.create', ['title' => 'Add Class', "menu" => "class", "breadcrumb" => [["name" => "Class list", "url" => "/class"], ["name" => "Add Class"]]]);
    }

    /** 
     *  Display the specified resource
     * 
     * @param \App\Models\Schedule $class
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $class)
    {
        $fs = Schedule::leftJoin('s_room', 'class_room_id', '=', 'room_id')
            ->leftJoin('s_subject', 'class_subj_id', '=', 'subj_id')
            ->leftJoin('s_instructor', 'class_inst_id', '=', 'inst_id')
            ->leftJoin('s_term', 'class_term_id', '=', 'term_id')
            ->selectRaw('
            class_id 
            , md5(class_id) as class_id_md5
            , class_flink as class_file_link
            , subj_code as class_subj_code
            , subj_name as class_subj_name
            , class_section as class_section
            , CONCAT(term_name, ", ", class_acadYear, "-", class_acadYear + 1) as class_sem_sy
            , room_name as class_room
            , CONCAT(inst_firstName, " ", inst_lastName) as class_instructor')
            ->where(["class_id" => $class->class_id])
            ->get()[0];

        $sched_timeSlot_day = "";
        $sched_timeSlot_time = "";

        $ts = new TimeSlot();
        $sched_timeSlots = $ts->select(['time_id', 'time_day', 'time_duration'])
            ->where("time_class_id",   $fs->class_id)
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

        return view('admin.class.show', ['menu_header' => 'Menu', 'title' => "Student Grades", "menu" => "class", "sub_menu" => "student-grades", "class" => $fs, "breadcrumb" => [["name" => "Class List", "url" => "/class"], ["name" => "Class details"]]]);
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

    /** 
     *  Retrieves the listing of the resource via Datatable
     * 
     * @return \Yajra\DataTables\Facades\DataTables
     */
    public function ajax_retrieve_class_list()
    {
        $query = Schedule::leftJoin('s_room', 'class_room_id', '=', 'room_id')
            ->leftJoin('s_subject', 'class_subj_id', '=', 'subj_id')
            ->leftJoin('s_instructor', 'class_inst_id', '=', 'inst_id')
            ->leftJoin('s_term', 'class_term_id', '=', 'term_id')
            ->select([
                'class_id'
                , DB::raw('md5(class_id) as class_id_md5')
                , 'subj_code'
                , DB::raw('subj_name as subject_name')
                , DB::raw('class_section as section')
                , DB::raw('CONCAT(term_name, ", SY ", CONCAT(class_acadYear, "-", class_acadYear + 1)) as semester_sy')
                , DB::raw('CONCAT(inst_firstName, COALESCE(CONCAT(" ", SUBSTRING(inst_middleName, 1, 1), "."), ""), " ", inst_lastName) as instructor')
                , DB::raw('(SELECT COUNT(*) FROM t_student_enrolled_subjects WHERE sche_enrsub_id = class_id) as enrolled_student_count')
                , 'class_createdAt'
                , 'class_updatedAt'
            ]);

        return Datatables::of($query)
            ->setRowId('class_id')
            ->addColumn('subject_code', function ($row) {

                return '<a href="' . url('/class') . "/" . $row->class_id . '">' . $row->subj_code . '</a>';
            })
            ->addColumn('schedule', function ($row) {
                $sched_timeSlot_day = "";
                $sched_timeSlot_time = "";

                $ts = new TimeSlot();
                $sched_timeSlots = $ts->select(['time_id', 'time_day', 'time_duration'])
                    ->where("time_class_id",   $row->class_id)
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

                return ($sched_timeSlot_day ? $sched_timeSlot_day : "") . ($sched_timeSlot_time ? " " . $sched_timeSlot_time : "") . ($row->room_name ? " " . $row->room_name : "");
            })
            ->addColumn('created_at', function ($row) {

                return format_datetime(strtotime($row->class_createdAt));
            })
            ->addColumn('updated_at', function ($row) {

                return ($row->class_updatedAt) ? format_datetime(strtotime($row->class_updatedAt)) : NULL;
            })
            ->addColumn('action', function ($row) {

                return '<div class="d-flex justify-content-start flex-shrink-0">
                <a href="' . url('/class') . "/" . $row->class_id . '" class=" btn btn-icon btn-light-dark btn-sm me-1">
                    <i class="fa-duotone fa-bars-sort fs-6"></i>
                 </a>

                <button type="button" kt_student_grades_table_edit class="btn btn-icon btn-light-warning btn-sm me-1">
                    <i class="fa-duotone fa-pen-to-square fs-6"></i>
                 </button>

                 <button type="button" kt_student_grades_table_delete class="btn btn-icon btn-light-danger btn-sm">
                 <i class="fa-duotone fa-trash"></i>
                </button>
            </div>';
            })
            ->rawColumns(['subject_code', 'action'])
            ->make(true);
    }


    /** 
     *  Create a new resource via ajax request
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function ajax_store_class(Request $request)
    {
        $request->validate([ 
            'subject' => 'required',
            'section' => 'required',
            'semester' => 'required',
            'school_year' => 'required',
            'instructor' => 'required',
            'room' => 'required',
            'gradesheet_file[storage_type]' => 'required',
            'gradesheet_file[file_path]' => 'required',
            'gradesheet_file[file_name]' => 'required',
        ]);


        

        
    }

    // Student grades via ajax request
    public function ajax_add_student_grade(Request $request)
    {
        $request->validate([
            'student' => 'required',
            'class_id' => 'required',
        ]);

        $d = [];
        foreach ($request->student as $s) {

            array_push($d, [
                "enrsub_midtermGrade" => $s['midterm_grade']
                , "enrsub_finalGrade" => $s["final_grade"]
                , "enrsub_finalRating" => $s["final_rating"]
                , "enrsub_grade_status" => $s["grade_status"]
                , "stud_enrsub_id" => $s['id']
                , "sche_enrsub_id" => $request->class_id
                , "enrsub_createdAt" => NOW()
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
            ->leftJoin('s_schedule', 'sche_enrsub_id', '=', 'class_id')
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
                <button type="button" kt_student_grades_table_edit class="btn btn-warning btn-sm me-1">
                     <i class="fa-duotone fa-pen-to-square me-2 fs-6"></i>Edit
                 </button>

                 <button type="button" kt_student_grades_table_delete class="btn btn-icon btn-light-danger btn-sm">
                 <i class="fa-duotone fa-trash"></i>
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


    /*
|--------------------------------------------------------------------------
|    End::Functions
|-------------------------------------------------------------------------- 
|
*/
}
