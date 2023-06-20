<?php

namespace App\Http\Controllers\Admin;


use DB;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Documents;
use App\Models\DocumentsType;

class DocumentsController extends Controller
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

        return view('admin.documents.index', ['menu_header' => 'System Setup', 'menu' => 'admission-requirements', 'sub_menu' => 'requirements', 'title' => "Documents", "breadcrumb" => [["name" => "System Setup"]]]);
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

    public function getAllDocuments($filter = null)
    {
        return (new Documents)->fetchAll($filter);
    }

    public function getOneDocument($md5Id)
    {
        return (new Documents)->fetchOne($md5Id);
    }

    public function createDocument($data)
    {
        (new Documents)->insertOne($data);
    }

    public function updateDocument($md5Id, $details)
    {
        (new Documents)->edit($md5Id, $details);
    }

    public function removeDocument($md5Id)
    {
        (new Documents)->remove($md5Id);
    }


    // -- Begin::Ajax Requests -- //

    public function ajax_retrieve_by_category($category)
    {
        $di = new Documents();
        $dd = $di->selectRaw('docu_id as `id`
        , docu_name as `text`
        ')->where(["docu_category" => strtoupper($category)])->get();

        header('Content-Type: application/json');
        echo json_encode($dd);
    }

    public function ajax_retrieveAll()
    {
        $di = new Documents();
        $dd = $di->selectRaw('s_documents.*, md5(docu_id) AS `docu_id_md5`')
            ->get();

        $dti = new DocumentsType();
        for ($i = 0; $i < sizeOf($dd); $i++) {

            $dd[$i]['types'] = $dti->select("docuType_name")
                ->where(["docuType_document" => $dd[$i]['docu_id']])->get();
        }

        header('Content-Type: application/json');
        echo json_encode($dd);
    }

    public function ajax_retrieve(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $di = new Documents();
        $d = $di->selectRaw("s_documents.*
        , md5(docu_id) as `docu_id_md5`")
            ->whereRaw("md5(docu_id) ='" . $request->id . "'")->get();

        $dti = new DocumentsType();
        $d[0]['types'] = $dti->where(["docuType_document" => $d[0]->docu_id])->get();

        header('Content-Type: application/json');
        echo json_encode($d);
    }

    public function ajax_retrieveTypes(Request $request)
    {

        $dti = new DocumentsType();
        $dt = $dti->where(["docuType_document" => $request->id])->get();

        header('Content-Type: application/json');
        echo json_encode($dt);
    }

    public function ajax_insert(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'category' => 'required'
        ]);

        $di = new Documents();
        $dId = $di->insertGetId([
            "docu_name" => $request->name,
            "docu_category" => $request->category,
            "docu_description" => $request->description,
            "docu_createdAt" => NOW()
        ]);

        $dti = new DocumentsType();
        $dt = $request->type;

        foreach ($dt as $t) {

            if ($t["name"] || $t["name"] != "") {

                $dti->insert([
                    "docuType_name" => $t["name"],
                    "docuType_document" => $dId,
                    "docuType_createdAt" => NOW()
                ]);
            }
        }

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.added_success', ['attribute' => 'Document'])
        ]);
    }

    public function ajax_update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'category' => 'required'
        ]);

        $di = new Documents();
        $dc = $di->whereRaw("md5(docu_id) ='" . $request->id . "'")->count();

        if ($dc == 1) {

            $dId = $di->whereRaw("md5(docu_id) ='" . $request->id . "'")->get()[0]['docu_id'];

            $di->where(["docu_id" => $dId])
                ->update([
                    "docu_name" => $request->name,
                    "docu_category" => $request->category,
                    "docu_description" => $request->description
                ]);

            $dt = $request->type;

            $dti = new DocumentsType();
            $dti->where(["docuType_document" => $dId])->forceDelete();

            if (sizeOf($dt) >= 1) {

                foreach ($dt as $t) {

                    if ($t["name"] || $t["name"] != "") {

                        $dti->insert([
                            "docuType_name" => $t["name"],
                            "docuType_document" => $dId,
                            "docuType_createdAt" => NOW()
                        ]);
                    }
                }
            }
        }

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.updated_success', ['attribute' => 'Document'])
        ]);
    }

    public function ajax_delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $this->removeDocument($request->id);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.deleted_success', ['attribute' => 'Document'])
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
