<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Controller 
use App\Http\Controllers\Admin\ScheduleController as Schedule;
use App\Http\Controllers\Admin\StudentProfileController as StudentProfile;

//Model
use App\Models\StudentGrades;

class StudentGradesController extends Controller
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

        $schedules = (new Schedule)->getAllSchedules();
        $students = (new StudentProfile)->getAllStudentProfile();
        $grades = get_grading_list();

        return view('admin.student-grades', ['menu_header' => 'Menu', 'title' => "Student Grades", "menu" => "student-records", "sub_menu" => "student-grades", "formData_schedule" => $schedules, "formData_students" => $students, "formData_grades" => $grades]);
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
        $size = $request->length;

        if ($request->search['value']) {
            $filter = [["enrsub_remarks", 'like', '%' . $request->search['value'] . '%']];
        }else {
            $filter = null;
        }

        header('Content-Type: application/json');
        echo json_encode($this->getAllStudentGrades($size, $filter));
    }

    public function ajax_retrieve(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode($this->getStudentGrade($request->id));
    }

    public function ajax_update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'student' => 'required',
            'schedule' => 'required',
        ]);


        $this->updateStudentGrade($request->id, $request);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.updated_success', ['attribute' => 'Student Grade'])
        ]);
    }

    public function ajax_delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $this->removeStudentGrade($request->id);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.deleted_success', ['attribute' => 'Student Grade'])
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
