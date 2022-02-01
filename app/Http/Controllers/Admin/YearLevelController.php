<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Model
use App\Models\YearLevel;

class YearLevelController extends Controller
{

    /*
|--------------------------------------------------------------------------
|    Begin::Functions
|-------------------------------------------------------------------------- 
|
*/


    public function createYearLevel($data)
    {   
        (new YearLevel)->insertOne($data);
    }

    public function getAllYearLevel($filter = null)
    {
        return (new YearLevel)->fetchAll($filter);
    }

    public function getYearLevel($md5Id)
    {
        return (new YearLevel)->fetchOne($md5Id);
    }

    public function updateYearLevelOrder($md5Id_list)
    {
        $year = new YearLevel;
        for ($i = 0; $i < sizeOf($md5Id_list); $i++) {
            $year->edit($md5Id_list[$i], ["year_order" => $i + 1]);
        }
    }

    public function updateYearLevel($md5Id, $details)
    {
        (new YearLevel)->edit($md5Id, ["year_name" => $details['name']]);
    }

    public function removeYearLevel($md5Id)
    {
        (new YearLevel)->remove($md5Id);
    }

    // -- Begin::Ajax Requests -- //

    public function ajax_insert(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255'
        ]);


        $this->createYearLevel($request);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'message' => __('modal.added_success', ['attribute' => 'Year Level'])
        ]);
    }

    public function ajax_retrieveAll()
    {

        header('Content-Type: application/json');
        echo json_encode($this->getAllYearLevel([]));
    }

    public function ajax_reorder(Request $request)
    {
        $request->validate([
            'id_list' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'data' => $this->updateYearLevelOrder($request->id_list),
            'message' => __('modal.updated_success', ['attribute' => 'Changes'])
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
            'data' => $this->getYearLevel($request->id)
        ]);
    }

    public function ajax_update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'name' => 'required|max:255',
        ]);

        $this->updateYearLevel($request['id'], ['name' => $request['name']]);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'message' => __('modal.updated_success', ['attribute' => 'Year Level'])
        ]);
    }

    public function ajax_delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $this->removeYearLevel($request->id);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "401",
            'message' => __('modal.deleted_success', ['attribute' => 'Year Level'])
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
