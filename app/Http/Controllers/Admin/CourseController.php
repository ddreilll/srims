<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Course;

class CourseController extends Controller
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

        return view('admin.course', ['menu_header' => 'System Setup', 'title' => "Course", "menu" => "course-curiculum", "sub_menu" => "course"]);
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


    public function createCourse($data)
    {
        (new Course)->insertOne($data);
    }

    public function getAllCourses($filter = null)
    {
        return (new Course)->fetchAll($filter);
    }

    public function getOneCourse($md5Id)
    {
        return (new Course)->fetchOne($md5Id);
    }

    public function updateCourse($md5Id, $details)
    {
        (new Course)->edit($md5Id, $details);
    }

    public function removeCourse($md5Id)
    {
        (new Course)->remove($md5Id);
    }


    // -- Begin::Ajax Requests -- //

    public function ajax_insert(Request $request)
    {

        $request->validate([
            'code' => 'required|max:15',
            'name' => 'required|max:255'
        ]);

        $this->createCourse($request);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.added_success', ['attribute' => 'Course'])
        ]);
    }

    public function ajax_retrieveAll()
    {

        header('Content-Type: application/json');
        echo json_encode($this->getAllCourses());
    }

    public function ajax_retrieve(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode($this->getOneCourse($request->id));
    }

    public function ajax_update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'code' => 'required|max:15',
            'name' => 'required|max:255'
        ]);

        $details = ['code' => $request['code'], 'name' => $request['name'], 'description' => $request['description']];

        $this->updateCourse($request['id'], $details);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.updated_success', ['attribute' => 'Course'])
        ]);
    }

    public function ajax_delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $this->removeCourse($request['id']);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.deleted_success', ['attribute' => 'Course'])
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
