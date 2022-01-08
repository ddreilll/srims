<?php

namespace App\Http\Controllers\Admin;


use DB;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\AdmissionRequirements as AdReq;


class AdmissionRequirementsController extends Controller
{

    // ===== Begin::Views ===== //

    public function index(Request $request) 
    {       
       
        return view('admin.admission-requirements', ['sides' => 'admission-requirements', 'title' => "Admission Requirements"]);
    }

    // ===== End::Views ===== //




    // ===== Begin::Functions ===== //
   
    // -- Begin::Ajax Requests -- //

    public function ajax_retrieveAll(){

        $Req = new AdReq;

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'data' => $Req->fetchAll([])
        ]);

    }

    public function ajax_retrieve(Request $request){

        $request->validate([
            'id' => 'required'
        ]);
 
        $Req = new AdReq;

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'data' => $Req->fetchOne($request->id)
        ]);

    }

    public function ajax_insert(Request $request){

        $request->validate([
            'code' => 'required|max:15',
            'name' => 'required|max:255'
        ]);

        $Req = new AdReq;
        $Req->insert($request);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'message' => __('modal.added_success', ['attribute' => 'Requirement'])
        ]);
    }

    public function ajax_update(Request $request){
        
        $request->validate([
            'code' => 'required|max:15',
            'name' => 'required|max:255'
        ]);

        $Req = new AdReq;
        $Req->edit($request);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'message' => __('modal.updated_success', ['attribute' => 'Requirement'])
        ]);


    }

    public function ajax_delete(Request $request){
        
        $request->validate([
            'id' => 'required'
        ]);

        $Req = new AdReq;
        $Req->remove($request->id);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "401"
        ]);


    }

        // -- End::Ajax Requests -- //

    // ===== End::Functions ===== //



}