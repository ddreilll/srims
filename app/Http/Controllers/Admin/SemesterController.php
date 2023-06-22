<?php

namespace App\Http\Controllers\Admin;

use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;

class SemesterController extends Controller
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
        // abort_if(Gate::denies('semester_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuHeader = $this->menuHeader;
        $menu = $this->menu;

        $title = "Semesters";
        $breadcrumb = [
            [
                "name" => "Semesters"
            ]
        ];

        $semesters = Term::order()->get();

        return view('admin.semesters.index', compact('menuHeader', 'title', 'menu', 'breadcrumb', 'semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // abort_if(Gate::denies('semester_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuHeader = $this->menuHeader;
        $menu = $this->menu;

        $title = "Add Semester";
        $breadcrumb = [
            [
                "name" => "Semesters",
                "url" => route('settings.semesters.index')
            ],
            [
                "name" => "Add Semester"
            ]
        ];

        return view('admin.semesters.create', compact('menuHeader', 'title', 'menu', 'breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSemesterRequest $request)
    {
        $term = Term::create($request->all());
        session()->flash('message', __('global.create_success', ["attribute" => sprintf("<b>%s %s</b>", __('global.new'), __('cruds.semester.title_singular'))]));

        return redirect()->route('settings.semesters.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $semester)
    {
        // abort_if(Gate::denies('semester_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuHeader = $this->menuHeader;
        $menu = $this->menu;

        $title = "Edit Semester";
        $breadcrumb = [
            [
                "name" => "Semesters",
                "url" => route('settings.semesters.index')
            ],
            [
                "name" => "Edit Semester"
            ]
        ];

        return view('admin.semesters.edit', compact('menuHeader', 'title', 'menu', 'breadcrumb', 'semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSemesterRequest $request, Term $semester)
    {
        $semester->update($request->all());

        session()->flash('message', __('global.update_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.semester.title_singular'))]));

        return redirect()->route('settings.semesters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $semester)
    {
        // abort_if(Gate::denies('semester_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $semester->delete();

        session()->flash('info', __('global.delete_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.semester.title_singular'))]));

        return back();
    }

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
}
