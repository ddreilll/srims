<?php

namespace App\Http\Controllers\BusinessRules;


use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DaysController extends Controller
{



    /*
|--------------------------------------------------------------------------
|    Begin::Functions
|-------------------------------------------------------------------------- 
|
*/

    public function getAllDays()
    {

        try {
            $days = Storage::disk('data')->exists('days.json') ? json_decode(Storage::disk('data')->get('days.json')) : [];

            return $days;
        } catch (Exception $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }



    /*
|--------------------------------------------------------------------------
|    Begin::Views
|-------------------------------------------------------------------------- 
|
*/
}
