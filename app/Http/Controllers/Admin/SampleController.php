<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $storage = Storage::disk('google');
        if($files = $storage->exists('05 SHARED FILE/240903062_399400674913552_4846254177386921257_n.png')){
            return 'YES';
        }
        return 'NO';

        // $newFiles = [];

        // foreach ($files as $key => $file) {
        //     array_push($newFiles, $storage->url($file));
        // }

        // return $newFiles
    }
}
