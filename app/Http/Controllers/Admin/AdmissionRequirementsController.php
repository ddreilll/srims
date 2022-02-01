<?php

namespace App\Http\Controllers\Admin;


use DB;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\AdmissionRequirements as AdReq;


class AdmissionRequirementsController extends Controller
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

        return view('admin.admission-requirements', ['menu_header' => 'System Setup', 'menu' => 'admission-requirements', 'sub_menu' => 'requirements', 'title' => "Admission Requirements"]);
    }

    /*
|--------------------------------------------------------------------------
|    End::Views
|--------------------------------------------------------------------------
|
|
*/




    /*
|--------------------------------------------------------------------------
|    Begin::Functions
|-------------------------------------------------------------------------- 
|
*/

    public function getAllRequirements($filter = null)
    {
        return (new AdReq)->fetchAll($filter);
    }

    public function getOneRequirement($md5Id)
    {
        return (new AdReq)->fetchOne($md5Id);
    }

    public function createRequirement($data)
    {
        (new AdReq)->insertOne($data);
    }

    public function updateRequirement($md5Id, $details)
    {
        (new AdReq)->edit($md5Id, $details);
    }

    public function removeRequirement($md5Id)
    {
        (new AdReq)->remove($md5Id);
    }


    // -- Begin::Ajax Requests -- //

    public function ajax_retrieveAll()
    {
        header('Content-Type: application/json');
        echo json_encode($this->getAllRequirements());
    }

    public function ajax_retrieve(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode($this->getOneRequirement($request->id));
    }

    public function ajax_insert(Request $request)
    {

        $request->validate([
            'code' => 'required|max:15',
            'name' => 'required|max:255'
        ]);

        $this->createRequirement($request);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.added_success', ['attribute' => 'Requirement'])
        ]);
    }

    public function ajax_update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'code' => 'required|max:15',
            'name' => 'required|max:255'
        ]);

        $details = ["code" => $request['code'], "name" => $request['name'], "description" => $request['description']];
        $this->updateRequirement($request->id, $details);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.updated_success', ['attribute' => 'Requirement'])
        ]);
    }

    public function ajax_delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $this->removeRequirement($request->id);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.deleted_success', ['attribute' => 'Requirement'])
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
