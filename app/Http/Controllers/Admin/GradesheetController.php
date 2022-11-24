<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//Model
use App\Models\Gradesheet;
use App\Models\GradesheetPages;
use App\Models\TimeSlot;

class GradesheetController extends Controller
{
    /*
|--------------------------------------------------------------------------
|    Begin::Views
|--------------------------------------------------------------------------
|
|    All functions that renders or display a page
|
*/

    /** 
     *  Show the form for creating a new resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gradesheet.create', ['title' => 'Add Gradesheet', "menu" => "class", "breadcrumb" => [["name" => "List of Gradesheets", "url" => "/class"], ["name" => "Add Gradesheet"]]]);
    }

    public function index()
    {
        return view('admin.gradesheet.index', ['menu_header' => 'Menu', 'title' => "List of Gradesheets", "menu" => "class", "sub_menu" => "student-grades", "breadcrumb" => [["name" => "List of Gradesheets"]]]);
    }

    /** 
     *  Display the specified resource
     * 
     * @param \App\Models\Gradesheet $gradesheet
     * @return \Illuminate\Http\Response
     */
    public function show(Gradesheet $gradesheet)
    {
        $fs = Gradesheet::leftJoin('s_room', 'class_room_id', '=', 'room_id')
            ->leftJoin('s_subject', 'class_subj_id', '=', 'subj_id')
            ->leftJoin('s_instructor', 'class_inst_id', '=', 'inst_id')
            ->leftJoin('s_term', 'class_term_id', '=', 'term_id')
            ->selectRaw('
            class_id 
            , md5(class_id) as class_id_md5
            , class_flink as class_file_link
            , subj_code as class_subj_code
            , subj_name as class_subj_name
            , class_fstorage as class_file_storage_type
            , class_section as class_section
            , CONCAT(term_name, ", ", class_acadYear, "-", class_acadYear + 1) as class_sem_sy
            , room_name as class_room
            , CONCAT(inst_firstName, " ", inst_lastName) as class_instructor')
            ->where(["class_id" => $gradesheet->class_id])
            ->get()[0];

        $sched_timeSlot_day = "";
        $sched_timeSlot_time = "";

        $ts = new TimeSlot();
        $sched_timeSlots = $ts->select(['time_id', 'time_day', 'time_duration'])
            ->where("time_class_id", $fs->class_id)
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

        $fs['gradesheet_pages'] = GradesheetPages::select(["grdsheetpg_rowNo", "grdsheetpg_flink", "grdsheetpg_fname"])->where("grdsheetpg_gradesheet_id", $fs->class_id)->get();

        return view('admin.gradesheet.show', ['menu_header' => 'Menu', 'title' => "Gradesheet details", "menu" => "class", "sub_menu" => "student-grades", "class" => $fs, "breadcrumb" => [["name" => "List of Gradesheets", "url" => "/gradesheet"], ["name" => "Gradesheet details"]]]);
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
     *  Create a new resource via ajax request
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'semester' => 'required',
            'school_year' => 'required',
            'instructor' => 'required',
        ]);

        $gradesheetData = [
            "class_section" => $request->section,
            "class_acadYear" => $request->school_year,
            "class_fstorage" => $request->gradesheet_file['storage_type'],
            "class_flink" => $request->gradesheet_file['file_path'],
            "class_fname" => $request->gradesheet_file['file_name'],
            "class_term_id" => $request->semester,
            "class_room_id" => $request->room,
            "class_subj_id" => $request->subject,
            "class_inst_id" => $request->instructor
        ];
        $gradesheetPages = $request->gradesheet_file['pages'];
        $gradesheetTimeSlot = ($request->timeslot) ? $request->timeslot : [];

        $gradesheetId = Gradesheet::insertGetId($gradesheetData);

        // insert gradesheet timeslots
        foreach ($gradesheetTimeSlot as $timeSlot) {
            TimeSlot::insert(["time_day" => $timeSlot['day'], "time_duration" => $timeSlot["time_start"] . " - " . $timeSlot["time_end"], "time_class_id" => $gradesheetId]);
        }

        // insert gradesheet pages
        $i = 1;
        foreach ($gradesheetPages as $page) {

            GradesheetPages::insert(["grdsheetpg_pgNo" => $i, "grdsheetpg_rowNo" => $page['tot_rows'], "grdsheetpg_flink" => $page["file_path"], "grdsheetpg_fname" => $page['file_name'], "grdsheetpg_gradesheet_id" => $gradesheetId]);
            $i++;
        }

        return response()->json([
            'message' => __('modal.added_success', ['attribute' => 'Gradesheet']),
            'id' => $gradesheetId
        ]);
    }

    /** 
     *  Fetching all the resources via ajax request
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function fetch_all()
    {
        $query = Gradesheet::leftJoin('s_room', 'class_room_id', '=', 'room_id')
            ->leftJoin('s_subject', 'class_subj_id', '=', 'subj_id')
            ->leftJoin('s_instructor', 'class_inst_id', '=', 'inst_id')
            ->leftJoin('s_term', 'class_term_id', '=', 'term_id')
            ->select([
                'class_id', DB::raw('md5(class_id) as class_id_md5'), 'subj_code', DB::raw('subj_name as subject_name'), DB::raw('class_section as section'), DB::raw('CONCAT(term_name, ", SY ", CONCAT(class_acadYear, "-", class_acadYear + 1)) as semester_sy'), DB::raw('CONCAT(inst_firstName, COALESCE(CONCAT(" ", SUBSTRING(inst_middleName, 1, 1), "."), ""), " ", inst_lastName) as instructor'), DB::raw('(SELECT COUNT(*) FROM t_student_enrolled_subjects WHERE class_enrsub_id = class_id) as enrolled_student_count'), 'class_createdAt', 'class_updatedAt'
            ]);

        return Datatables::eloquent($query)
            ->setRowId('class_id')
            ->addColumn('subject_code', function ($row) {

                return '<a href="' . url('/gradesheet') . "/" . $row->class_id . '">' . $row->subj_code . '</a>';
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
                return '<td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                    </svg>
                </span>
                </a>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                    <div class="menu-item px-3">
                        <a href="' . url('gradesheet/') . '/' . $row->class_id . '" class="menu-link px-3">View</a>
                    </div>
                    <div class="menu-item px-3 ">
                        <a href="' . url('gradesheet') . '/' . $row->class_id . '/edit" class="menu-link px-3">Edit</a>
                    </div>
                    <div class="separator my-3 opacity-75"></div>
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3 menu-hover-warning" kt_student_profile_table_archive>
                        <span class="menu-icon">
                             <i class="fa-duotone fa-trash fs-5"></i>
                        </span>
                        <span class="menu-title">Delete</span>
                        </a>
                    </div>
                </div>
                 </td>';
            })
            ->filterColumn('subject_code', function ($query, $keyword) {
                $query->whereRaw("subj_code like ?", ["%%{$keyword}%%"]);
            })
            ->filterColumn('subject_name', function ($query, $keyword) {
                $query->whereRaw("subj_name like ?", ["%%{$keyword}%%"]);
            })
            ->filterColumn('section', function ($query, $keyword) {
                $query->whereRaw("class_section like ?", ["%%{$keyword}%%"]);
            })
            ->filterColumn('instructor', function ($query, $keyword) {
                $query->whereRaw('CONCAT(inst_firstName, COALESCE(inst_middleName, ""), " ", inst_lastName) like ?', ["%%{$keyword}%%"]);
            })
            ->rawColumns(['subject_code', 'action'])
            ->toJson();
    }

    /*
|--------------------------------------------------------------------------
|    End::Functions
|-------------------------------------------------------------------------- 
|
*/
}
