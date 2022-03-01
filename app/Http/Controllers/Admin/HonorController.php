<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Model
use App\Models\Honor;

class HonorController extends Controller
{

    /*
|--------------------------------------------------------------------------
|    Begin::Functions
|-------------------------------------------------------------------------- 
|
*/


    public function createHonor($data)
    {   
        (new Honor)->insertOne($data);
    }

    public function getAllHonors($filter = null)
    {
        return (new Honor)->fetchAll($filter);
    }

    public function getHonor($md5Id)
    {
        return (new Honor)->fetchOne($md5Id);
    }

    public function updateHonor($md5Id, $details)
    {
        (new Honor)->edit($md5Id, $details);
    }

    public function removeHonor($md5Id)
    {
        (new Honor)->remove($md5Id);
    }

    // -- Begin::Ajax Requests -- //

    public function ajax_insert(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ]);


        $this->createHonor($request);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.added_success', ['attribute' => 'Honor'])
        ]);
    }

    public function ajax_retrieveAll()
    {

        header('Content-Type: application/json');
        echo json_encode($this->getAllHonors());
    }


    public function ajax_retrieve(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode($this->getHonor($request->id));
    }

    public function ajax_update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        $this->updateHonor($request->id, ['honor_name' => $request->name]);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.updated_success', ['attribute' => 'Honor'])
        ]);
    }

    public function ajax_delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $this->removeHonor($request->id);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.deleted_success', ['attribute' => 'Honor'])
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
