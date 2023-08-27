<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Yajra\DataTables\Facades\DataTables;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('subject_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Subject::select(sprintf('%s.*', (new Subject)->table));

            $table = Datatables::eloquent($query);

            $table->editColumn('subj_code', function ($row) {
                return $row->subj_code ? $row->subj_code : '';
            });

            $table->editColumn('subj_name', function ($row) {
                return $row->subj_name ? $row->subj_name : '';
            });

            $table->editColumn('subj_units', function ($row) {
                return $row->subj_units ? $row->subj_units : '';
            });

            $table->addColumn('actions', function ($row) {
                $editGate      = 'subject_edit';
                $deleteGate    = 'subject_delete';

                $crudRoutePart = 'settings.subjects';
                $primaryKey = 'subj_id';
                $resource = 'subject';

                return view('partials.dataTables.actionBtns', compact(
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'primaryKey',
                    'resource',
                    'row'
                ));
            });

            $table->rawColumns(['actions']);

            return $table->make(true);
        }

        addJavascriptFile(asset('assets/js/datatables.js'));
        return view('admin.subjects.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('subject_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        abort_if(Gate::denies('subject_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subject = Subject::create($request->all());

        session()->flash('message', __('global.create_success', ["attribute" => sprintf("<b>%s %s</b>", __('global.new'), __('cruds.subject.title_singular'))]));

        return redirect()->route('settings.subjects.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        abort_if(Gate::denies('subject_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->all());

        session()->flash('message', __('global.update_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.subject.title_singular'))]));

        return redirect()->route('settings.subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        abort_if(Gate::denies('subject_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subject->delete();

        session()->flash('info', __('global.delete_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.subject.title_singular'))]));

        return redirect()->route('settings.subjects.index');
    }

    public function ajax_select2_search(Request $request)
    {

        if ($request->ajax()) {

            $term = trim($request->term);
            $subjects = Subject::select(
                DB::raw('subj_id as id'),
                DB::raw('subj_name as text'),
                'subj_code',
                'subj_name',
                'subj_units',
            )->where('subj_name', 'LIKE',  '%' . $term . '%')
                ->orWhere('subj_code', 'LIKE',  '%' . $term . '%')
                ->simplePaginate(10);

            $morePages = true;

            if (empty($subjects->nextPageUrl())) {
                $morePages = false;
            }

            $results = array(
                "results" => $subjects->items(),
                "pagination" => array(
                    "more" => $morePages
                )
            );

            return response()->json($results);
        }
    }
}
