<?php

namespace App\Http\Controllers\Admin;

use App\Models\YearLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreYearLevelRequest;
use App\Http\Requests\UpdateYearLevelRequest;

class YearLevelController extends Controller
{

    protected $menuHeader = "System Settings";
    protected $menu = "system-settings";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // abort_if(Gate::denies('year_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuHeader = $this->menuHeader;
        $menu = $this->menu;

        $title = "Year Levels";
        $breadcrumb = [
            [
                "name" => "Year Levels"
            ]
        ];

        $yearLevels = YearLevel::order()->get();

        return view('admin.year_levels.index', compact('menuHeader', 'title', 'menu', 'breadcrumb', 'yearLevels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // abort_if(Gate::denies('year_level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuHeader = $this->menuHeader;
        $menu = $this->menu;

        $title = "Add Year Level";
        $breadcrumb = [
            [
                "name" => "Year Levels",
                "url" => route('settings.year-levels.index')
            ],
            [
                "name" => "Add Year Level"
            ]
        ];

        return view('admin.year_levels.create', compact('menuHeader', 'title', 'menu', 'breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreYearLevelRequest $request)
    {
        $yearLevel = YearLevel::create($request->all());
        
        session()->flash('message', __('global.create_success', ["attribute" => sprintf("<b>%s %s</b>", __('global.new'), __('cruds.yearLevel.title_singular'))]));

        return redirect()->route('settings.year-levels.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(YearLevel $yearLevel)
    {
        // abort_if(Gate::denies('year_level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuHeader = $this->menuHeader;
        $menu = $this->menu;

        $title = "Edit Year Level";
        $breadcrumb = [
            [
                "name" => "Year Levels",
                "url" => route('settings.year-levels.index')
            ],
            [
                "name" => "Edit Year Level"
            ]
        ];

        return view('admin.year_levels.edit', compact('menuHeader', 'title', 'menu', 'breadcrumb', 'yearLevel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateYearLevelRequest $request, YearLevel $yearLevel)
    {
        $yearLevel->update($request->all());

        session()->flash('message', __('global.update_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.yearLevel.title_singular'))]));

        return redirect()->route('settings.year-levels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(YearLevel $yearLevel)
    {
        // abort_if(Gate::denies('year_level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yearLevel->delete();

        session()->flash('info', __('global.delete_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.yearLevel.title_singular'))]));

        return back();
    }
}
