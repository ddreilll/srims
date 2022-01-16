<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Controller 
use App\Http\Controllers\BusinessRules\DaysController as Days;
use App\Http\Controllers\BusinessRules\AcadYearController as AcadYears;
use App\Http\Controllers\Admin\SubjectController as Subjects;
use App\Http\Controllers\Admin\RoomController as Rooms;
use App\Http\Controllers\Admin\InstructorController as Instructors;
use App\Http\Controllers\Admin\TermController as Terms;

//Model
use App\Schedule;
use App\TimeSlot;

class ScheduleController extends Controller
{
    /*
|--------------------------------------------------------------------------
|    Begin::Views
|--------------------------------------------------------------------------
|
|    All functions that renders or display a page
|
*/

    public function index()
    {
        $days = (new Days)->getAllDays();
        $subjects = (new Subjects)->getAllSubjects([]);
        $rooms = (new Rooms)->getAllRooms([]);
        $instructors = (new Instructors)->getAllInstructors([]);
        $acadYears = (new AcadYears)->getAllYears();
        $terms = (new Terms)->getAllTerm([]);

        return view('admin.schedule', ['menu_header' => 'System Setup', 'title' => "Schedules", "menu" => "schedules-menu", "sub_menu" => "schedules", "formData_days" => $days, "formData_subjects" => $subjects, "formData_rooms" => $rooms, "formData_instructors" => $instructors, "formData_acadYears" => $acadYears, "formData_terms" => $terms]);
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
    public function isvalidSchedule($sched_details)
    {
        $sched_details['section'] = (!$sched_details['section']) ? 'IS NULL' : "= '" . $sched_details['section'] . "'";

        if (!$sched_details['id']) {
            $schedules = (new Schedule)->fetchAll("
            subj_sche_id = '{$sched_details['subject']}' 
            and sche_section {$sched_details['section']}
            and sche_acadYear = '{$sched_details['year']}' 
            and term_sche_id = '{$sched_details['semester']}'
            and inst_sche_id = '{$sched_details['instructor']}' 
            and ((room_sche_id = '{$sched_details['room']}' or room_sche_id IS NULL) or room_sche_id != '{$sched_details['room']}')");
        } else {
            $schedules = (new Schedule)->fetchAll("
            md5(sche_id) != '{$sched_details['id']}'
            and subj_sche_id = '{$sched_details['subject']}' 
            and sche_section {$sched_details['section']}
            and sche_acadYear = '{$sched_details['year']}' 
            and term_sche_id = '{$sched_details['semester']}'
            and inst_sche_id = '{$sched_details['instructor']}' 
            and ((room_sche_id = '{$sched_details['room']}' or room_sche_id IS NULL) or room_sche_id != '{$sched_details['room']}')");
        }

        if (sizeof($schedules) >= 1) {
            return false;
        } else {
            return true;
        }
    }

    public function createSchedule($sched_details, $time_slots)
    {

        $sched_id = (new Schedule)->insertOne($sched_details);

        for ($i = 0; $i < sizeof($time_slots); $i++) {
            (new TimeSlot)->insertOne($sched_id, $time_slots[$i]);
        }
    }

    public function getAllSchedules($filter = null)
    {
        $schedule = new Schedule;
        $schedules = $schedule->fetchAll($filter);

        for ($i = 0; $i < sizeOf($schedules); $i++) {
            $schedules[$i]['sche_timeSlots'] = $schedule->fetchTimeSlots($schedules[$i]['sche_id_md5']);
        }

        return $schedules;
    }

    public function getSchedule($md5Id)
    {
        $schedules = new Schedule();

        $schedule = $schedules->fetchOne($md5Id);
        $schedule[0]['sche_timeSlots'] = $schedules->fetchTimeSlots($md5Id);

        return $schedule;
    }

    public function updateSchedule($md5Id, $sched_details, $time_slots)
    {
        $schedule = $this->getSchedule($md5Id)[0];
        $sched_id = $schedule['sche_id'];

        (new Schedule)->edit($md5Id, $sched_details);

        $timeSlot = new TimeSlot;
        $timeSlot->massDelete(["sche_time_id" => $sched_id]);

        for ($i = 0; $i < sizeof($time_slots); $i++) {
            $timeSlot->insertOne($sched_id, $time_slots[$i]);
        }
    }

    public function removeSchedule($md5Id)
    {
        (new Schedule)->remove($md5Id);
    }

    // -- Begin::Ajax Requests -- //


    public function ajax_insert(Request $request)
    {

        $request->validate([
            'subject' => 'required',
            'semester' => 'required',
            'year' => 'required',
            'instructor' => 'required',
        ]);

        $this->createSchedule(
            ["subject" => $request->subject, "section" => $request->section, "semester" => $request->semester, "year" => $request->year, "room" => $request->room, "instructor" => $request->instructor],
            $request->time_slots
        );

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.added_success', ['attribute' => 'Schedule'])
        ]);
    }

    public function ajax_retrieveAll()
    {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'data' => $this->getAllSchedules()
        ]);
    }

    public function ajax_validate(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'semester' => 'required',
            'year' => 'required',
            'instructor' => 'required',
        ]);

        header('Content-Type: application/json');
        echo json_encode([
            'isValid' => $this->isvalidSchedule($request)
        ]);
    }

    public function ajax_retrieve(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode($this->getSchedule($request->id));
    }

    public function ajax_update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'subject' => 'required',
            'semester' => 'required',
            'year' => 'required',
            'instructor' => 'required',
        ]);

        $this->updateSchedule(
            $request->id,
            ["subject" => $request->subject, "section" => $request->section, "semester" => $request->semester, "year" => $request->year, "room" => $request->room, "instructor" => $request->instructor],
            $request->time_slots
        );

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.updated_success', ['attribute' => 'Schedule'])
        ]);
    }

    public function ajax_delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $this->removeSchedule($request->id);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.deleted_success', ['attribute' => 'Schedule'])
        ]);
    }

    // -- End::Ajax Requests -- //

    /*
|--------------------------------------------------------------------------
|    End::Functions
|-------------------------------------------------------------------------- 
|
*/
}
