<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;

// Model
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RoomController extends Controller
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
        return view('admin.room', ['title' => "Room", "menu" => "schedules-menu", "sub_menu" => "room", "menu_header" => "System Setup"]);
    }

    /*
|
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

    public function createRoom($data)
    {
        (new Room)->insertOne($data);
    }

    public function getAllRooms($filter = null)
    {
        return (new Room)->fetchAll($filter);
    }

    public function getOneRoom($md5Id)
    {
        return (new Room)->fetchOne($md5Id);
    }

    public function updateRoom($md5Id, $details)
    {
        (new Room)->edit($md5Id, $details);
    }

    public function removeRoom($md5Id)
    {
        (new Room)->remove($md5Id);
    }



    // -- Begin::Ajax Requests -- //

    public function ajax_insert(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50'
        ]);

        $this->createRoom($request);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.added_success', ['attribute' => 'Room'])
        ]);
    }

    public function ajax_retrieveAll()
    {
        header('Content-Type: application/json');
        echo json_encode($this->getAllRooms());
    }

    public function ajax_retrieve(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        header('Content-Type: application/json');
        echo json_encode($this->getOneRoom($request->id));
    }

    public function ajax_update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|max:50'
        ]);

        $details = ['name' => $request['name']];

        $this->updateRoom($request['id'], $details);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.updated_success', ['attribute' => 'Room'])
        ]);
    }

    public function ajax_delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $this->removeRoom($request['id']);

        header('Content-Type: application/json');
        echo json_encode([
            'message' => __('modal.deleted_success', ['attribute' => 'Room'])
        ]);
    }


    public function ajax_select2_search(Request $request)
    {

        if ($request->ajax()) {

            $term = trim($request->term);
            $rooms = Room::select(
                DB::raw('room_id as id'),
                DB::raw('room_name as text'),
            )->where('room_name', 'LIKE',  '%' . $term . '%')
            ->orderBy('room_name', 'asc')
                ->simplePaginate(10);

            $morePages = true;

            if (empty($rooms->nextPageUrl())) {
                $morePages = false;
            }

            $results = array(
                "results" => $rooms->items(),
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
