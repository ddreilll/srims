<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Controller 
use App\Http\Controllers\Admin\AcadYearController as AcadYears;
use App\Http\Controllers\Admin\CourseController as Course;
use App\Http\Controllers\Admin\StudentGradesController as StudentGrades;
use App\Http\Controllers\Admin\HonorController as Honors;

//Model
use App\Models\StudentProfile;
use App\Role;

class StudentProfileController extends Controller
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
        $acadYears = (new AcadYears)->getAllYears();
        $course = (new Course)->getAllCourses();
        $honors = (new Honors)->getAllHonors();

        return view('admin.student-profile', ['menu_header' => 'Menu', 'title' => "Student Profile", "menu" => "student-records", "sub_menu" => "student-profile", "formData_year" => $acadYears, "formData_course" => $course, "formData_honors" => $honors]);
    }

    public function view_profile($profile_uuid)
    {
        $fetched_profile = (new StudentProfile)->fetchAll(['stud_uuid' => $profile_uuid]);


        if (sizeof($fetched_profile) == 1) {
            $profile = $fetched_profile[0];
            $studentGrades = (new StudentGrades)->getGradesPerStudent($profile['stud_id_md5']);

            return view('admin.student-profile-details', ['menu_header' => 'Student Profile', 'title' => 'Student Details', "menu" => "student-records", "sub_menu" => "student-profile", "stud_profile" => $profile, "stud_grades" => $studentGrades['grades'], "stud_total_semester" => $studentGrades['total_semester'], "stud_total_summer_semester" => $studentGrades['total_summer_semester']]);
        } else {

            return view('errors.not-found', ['menu_header' => 'Menu', 'title' => "Profile not found", "menu" => "student-records", "sub_menu" => "student-profile"]);
        };
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

    public function createStudentProfile($student_details)
    {
        (new StudentProfile)->insertOne($student_details);
    }

    public function getAllStudentProfile($filter = null)
    {
        return (new StudentProfile)->fetchAll($filter);
    }

    public function getStudentProfile($md5Id)
    {
        return (new StudentProfile)->fetchOne($md5Id);
    }

    public function updateStudentProfile($md5Id, $student_details)
    {

        if ($student_details['isGraduated'] == "YES") {
            $student_details['dateGraduated'] = date("Y-m-d", strtotime($student_details['dateGraduated']));
            $student_details['honor'] = $student_details['honor'];
        } else {
            $student_details['dateGraduated'] = null;
            $student_details['honor'] = null;
        }

        (new StudentProfile)->edit($md5Id, [
            'stud_studentNo' => $student_details['studentNo'],
            'stud_firstName' => $student_details['firstName'],
            'stud_middleName' => $student_details['middleName'],
            'stud_lastName' => $student_details['lastName'],
            'stud_suffix' => $student_details['suffix'],
            'cour_stud_id' => $student_details['course'],
            'stud_yearOfAdmission' => $student_details['yearOfAdmission'],
            'stud_admissionType' => $student_details['admissionType'],
            'stud_isGraduated' => $student_details['isGraduated'],
            'stud_dateGraduated' => $student_details['dateGraduated'],
            'stud_honor' => $student_details['honor'],
            'stud_addressLine' => $student_details['addressLine'],
            'stud_addressCity' => $student_details['addressCity'],
            'stud_addressProvince' => $student_details['addressProvince'],
        ]);
    }

    public function removeStudentProfile($md5Id)
    {
        (new StudentProfile)->remove($md5Id);
    }


    // -- Begin::Ajax Requests -- //


    public function ajax_insert(Request $request)
    {

        $request->validate([
            'studentNo' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'course' => 'required',
            'yearOfAdmission' => 'required',
            'admissionType' => 'required',
            'isGraduated' => 'required',
            'addressLine' => 'required',
            'addressProvince' => 'required',
            'addressCity' => 'required',
        ]);

        $this->createStudentProfile($request);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.added_success', ['attribute' => 'Student Profile'])
        ]);
    }

    public function ajax_retrieveAll()
    {
        header('Content-Type: application/json');
        echo json_encode($this->getAllStudentProfile());
    }

    public function ajax_retrieve(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode($this->getStudentProfile($request->id));
    }

    public function ajax_update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'studentNo' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'course' => 'required',
            'yearOfAdmission' => 'required',
            'isGraduated' => 'required',
            'admissionType' => 'required',
            'addressLine' => 'required',
            'addressProvince' => 'required',
            'addressCity' => 'required',
        ]);


        $this->updateStudentProfile($request->id, $request);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.updated_success', ['attribute' => 'Student Profile'])
        ]);
    }

    public function ajax_delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $this->removeStudentProfile($request->id);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.deleted_success', ['attribute' => 'Student Profile'])
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
