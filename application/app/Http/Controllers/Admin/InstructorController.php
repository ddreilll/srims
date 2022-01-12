<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Instructor;

class InstructorController extends Controller
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

        return view('admin.instructor', ['menu_header' => 'System Setup', 'title' => "Instructor", "menu" => "schedules-menu", "sub_menu" => "instructor"]);
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
    public function createInstructor($data)
    {
        (new Instructor)->insertOne($data);
    }

    public function getAllInstructors($filter)
    {
        return (new Instructor)->fetchAll($filter);
    }

    public function getOneInstructor($md5Id)
    {
        return (new Instructor)->fetchOne($md5Id);
    }

    public function updateInstructor($md5Id, $details)
    {
        (new Instructor)->edit($md5Id, $details);
    }

    public function removeInstructor($md5Id)
    {
        (new Instructor)->remove($md5Id);
    }



    // -- Begin::Ajax Requests -- //

    public function ajax_insert(Request $request)
    {

        $request->validate([
            'empNo' => 'required|max:50',
            'name' => 'required|max:255'
        ]);

        $this->createInstructor($request);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'message' => __('modal.added_success', ['attribute' => 'Instructor'])
        ]);
    }

    public function ajax_retrieveAll()
    {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'data' => $this->getAllInstructors([])
        ]);
    }

    public function ajax_retrieve(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'data' => $this->getOneInstructor($request->id)
        ]);
    }

    public function ajax_update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'empNo' => 'required|max:50',
            'name' => 'required|max:255'
        ]);

        $details = [
            'empNo' => $request['empNo'],
            'name' => $request['name']
        ];

        $this->updateInstructor($request['id'], $details);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'message' => __('modal.updated_success', ['attribute' => 'Room'])
        ]);
    }

    public function ajax_delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $this->removeInstructor($request['id']);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "401",
            'message' => __('modal.deleted_success', ['attribute' => 'Room'])
        ]);
    }
    /*
|--------------------------------------------------------------------------
|    End::Functions
|-------------------------------------------------------------------------- 
|
*/
}
