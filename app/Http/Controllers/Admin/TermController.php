<?php

namespace App\Http\Controllers\Admin;

use App\Models\Term;
use Illuminate\Http\Request;

// Model
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TermController extends Controller
{

    /*
|--------------------------------------------------------------------------
|    Begin::Functions
|-------------------------------------------------------------------------- 
|
*/


    public function createTerm($data)
    {
        (new Term)->insertOne($data);
    }

    public function getAllTerm($filter = null)
    {
        return (new Term)->fetchAll($filter);
    }

    public function getTerm($md5Id)
    {
        return (new Term)->fetchOne($md5Id);
    }

    public function updateTermOrder($md5Id_list)
    {
        $term = new Term;
        for ($i = 0; $i < sizeOf($md5Id_list); $i++) {
            $term->edit($md5Id_list[$i], ["term_order" => $i + 1]);
        }
    }

    public function updateTerm($md5Id, $details)
    {
        (new Term)->edit($md5Id, ["term_name" => $details['name']]);
    }

    public function removeTerm($md5Id)
    {
        (new Term)->remove($md5Id);
    }

    // -- Begin::Ajax Requests -- //

    public function ajax_insert(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50'
        ]);


        $this->createTerm($request);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'message' => __('modal.added_success', ['attribute' => 'Term'])
        ]);
    }

    public function ajax_retrieveAll()
    {

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'data' => $this->getAllTerm([])
        ]);
    }

    public function ajax_reorder(Request $request)
    {
        $request->validate([
            'id_list' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'data' => $this->updateTermOrder($request->id_list),
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
            'data' => $this->getTerm($request->id)
        ]);
    }

    public function ajax_update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'name' => 'required|max:50',
        ]);

        $this->updateTerm($request['id'], ['name' => $request['name']]);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "200",
            'message' => __('modal.updated_success', ['attribute' => 'Term'])
        ]);
    }

    public function ajax_delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $this->removeTerm($request->id);

        header('Content-Type: application/json');
        echo json_encode([
            'status' => "401",
            'message' => __('modal.deleted_success', ['attribute' => 'Term'])
        ]);
    }

    // -- End::Ajax Requests -- //


    public function ajax_select2_search(Request $request)
    {

        if ($request->ajax()) {

            $term = trim($request->term);
            $terms = Term::select(
                DB::raw('term_id as id'),
                DB::raw('term_name as text'),
            )->where('term_name', 'LIKE',  '%' . $term . '%')
            ->orderBy('term_order', 'asc')
            ->simplePaginate(10);

            $morePages = true;

            if (empty($terms->nextPageUrl())) {
                $morePages = false;
            }

            $results = array(
                "results" => $terms->items(),
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
