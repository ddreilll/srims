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

        return view('admin.schedule', ['menu_header' => 'System Setup', 'title' => "Schedules", "menu" => "schedules-menu", "sub_menu" => "schedules", "formData_days" => $days, "formData_subjects" => $subjects, "formData_rooms" => $rooms, "formData_instructors" => $instructors, "formData_acadYears" => $acadYears]);
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

    public function createSchedule($sched_details, $time_slots)
    {

        $sched_id = (new Schedule)->insertOne($sched_details);

        for ($i = 0; $i < sizeof($time_slots); $i++) {
            (new TimeSlot)->insertOne($sched_id, $time_slots[$i]);
        }
    }

    public function getAllSchedules($filter)
    {
        $schedule = new Schedule;
        $schedules = $schedule->fetchAll($filter);

        for ($i = 0; $i < sizeOf($schedules); $i++) {
            $schedules[$i]['sche_timeSlots'] = $schedule->fetchTimeSlots($schedules[$i]['sche_id_md5']);
        }

        return $schedules;
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
            'data' => $this->getAllSchedules([])
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
