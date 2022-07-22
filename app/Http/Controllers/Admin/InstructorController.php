<?php

namespace App\Http\Controllers\Admin;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Models
use App\Http\Controllers\Controller;

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

    public function getAllInstructors($filter = null)
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
            'emp_no' => 'string|max:20|required',
            'first_name' => 'string|max:50|required',
            'middle_name' => 'string|max:50|nullable',
            'last_name' => 'string|max:50|required',
            'suffix_name' => 'string|max:10|nullable'
        ]);

        $this->createInstructor($request);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.added_success', ['attribute' => 'Instructor'])
        ]);
    }

    public function ajax_retrieveAll()
    {
        header('Content-Type: application/json');
        echo json_encode($this->getAllInstructors());
    }

    public function ajax_retrieve(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode($this->getOneInstructor($request->id));
    }

    public function ajax_update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'emp_no' => 'string|max:20|required',
            'first_name' => 'string|max:50|required',
            'middle_name' => 'string|max:50|nullable',
            'last_name' => 'string|max:50|required',
            'suffix_name' => 'string|max:10|nullable'
        ]);

        $details = [
            'emp_no' => $request['emp_no'],
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'suffix_name' => $request['suffix_name']
        ];

        $this->updateInstructor($request['id'], $details);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.updated_success', ['attribute' => 'Instructor'])
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
            'message' => __('modal.deleted_success', ['attribute' => 'Instructor'])
        ]);
    }



    public function ajax_select2_search(Request $request)
    {

        if ($request->ajax()) {

            $term = trim($request->term);
            $instructor = Instructor::select(
                DB::raw('inst_id as id'),
                DB::raw('CONCAT(inst_firstName, COALESCE(CONCAT(" ", SUBSTRING(inst_middleName, 1, 1), "."), ""), " ", inst_lastName) as full_name'),
                DB::raw('inst_empNo as emp_no'),
            )->where('inst_empNo', 'LIKE',  '%' . $term . '%')
                ->orWhere('inst_firstName', 'LIKE',  '%' . $term . '%')
                ->orWhere('inst_middleName', 'LIKE',  '%' . $term . '%')
                ->orWhere('inst_lastName', 'LIKE',  '%' . $term . '%')
                ->orderBy('inst_empNo', 'asc')
                ->simplePaginate(10);

            $morePages = true;

            if (empty($instructor->nextPageUrl())) {
                $morePages = false;
            }

            $results = array(
                "results" => $instructor->items(),
                "pagination" => array(
                    "more" => $morePages
                )
            );

            return response()->json($results);
        }
    }
    /*
|--------------------------------------------------------------------------
|    End::Functions
|-------------------------------------------------------------------------- 
|
*/
}
